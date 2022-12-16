<?php

namespace ByJoby\HTML;

use ByJoby\HTML\Containers\Fragment;
use ByJoby\HTML\Containers\FragmentInterface;
use ByJoby\HTML\Containers\GenericHtmlDocument;
use ByJoby\HTML\Containers\HtmlDocumentInterface;
use ByJoby\HTML\Nodes\CData;
use ByJoby\HTML\Nodes\CDataInterface;
use ByJoby\HTML\Nodes\Comment;
use ByJoby\HTML\Nodes\CommentInterface;
use ByJoby\HTML\Nodes\Text;
use ByJoby\HTML\Nodes\TextInterface;
use ByJoby\HTML\Tags\ContentTagInterface;
use ByJoby\HTML\Tags\TagInterface;
use DOMComment;
use DOMDocument;
use DOMElement;
use DOMNode;
use DOMText;

abstract class AbstractParser
{
    /** @var array<int,string> */
    protected $tag_namespaces = [];

    /** @var array<string,class-string<TagInterface>> */
    protected $tag_classes = [];

    /** @var class-string<CommentInterface> */
    protected $comment_class = Comment::class;

    /** @var class-string<TextInterface> */
    protected $text_class = Text::class;

    /** @var class-string<CDataInterface> */
    protected $cdata_class = CData::class;

    /** @var class-string<HtmlDocumentInterface> */
    protected $document_class;

    /** @var class-string<FragmentInterface> */
    protected $fragment_class = Fragment::class;

    public function parseFragment(string $html): FragmentInterface
    {
        $fragment = new ($this->fragment_class);
        $dom = new DOMDocument();
        $dom->loadHTML(
            '<div>' . $html . '</div>', // wrap in DIV otherwise it will wrap root-level text in P tags
            LIBXML_BIGLINES
                | LIBXML_COMPACT
                | LIBXML_HTML_NOIMPLIED
                | LIBXML_HTML_NODEFDTD
                | LIBXML_PARSEHUGE
                | LIBXML_NOERROR
        );
        $this->walkDom($dom->childNodes[0], $fragment);
        return $fragment;
    }

    public function parseDocument(string $html): HtmlDocumentInterface
    {
        /** @var HtmlDocumentInterface */
        $document = new ($this->document_class);
        $dom = new DOMDocument();
        $dom->loadHTML(
            $html,
            LIBXML_BIGLINES
                | LIBXML_COMPACT
                | LIBXML_HTML_NODEFDTD
                | LIBXML_PARSEHUGE
                | LIBXML_NOERROR
        );
        $this->walkDom($dom, $document);
        return $document;
    }

    protected function walkDom(DOMNode $node, ContainerInterface $parent): void
    {
        foreach ($node->childNodes as $child) {
            if ($converted_child = $this->convertNode($child)) {
                // append converted child to parent
                $parent->addChild($converted_child);
                // walk DOM for child if it is a container
                if ($converted_child instanceof ContainerInterface) {
                    $this->walkDom($child, $converted_child);
                }
            }
        }
    }

    protected function convertNode(DOMNode $node): null|NodeInterface
    {
        if ($node instanceof DOMElement) {
            return $this->convertNodeToTag($node);
        } elseif ($node instanceof DOMComment) {
            return new ($this->comment_class)($node->textContent);
        } elseif ($node instanceof DOMText) {
            return new ($this->text_class)($node->textContent);
        }
        // This line shouldn't be reached, but if it is it's philosophically
        // consistent to simply ignore unknown node types
        return null; // @codeCoverageIgnore
    }

    protected function convertNodeToTag(DOMElement $node): null|NodeInterface
    {
        // build object
        $class = $this->tagClass($node->tagName);
        if (!$class) return null;
        $tag = new $class;
        // tool for settin gup content tags
        if ($tag instanceof ContentTagInterface) {
            $tag->setContent($node->textContent);
        }
        // external helper methods to stay tidy
        if ($tag instanceof TagInterface) {
            $this->processAttributes($node, $tag);
        }
        return $tag;
    }

    protected function processAttributes(DOMElement $node, TagInterface $tag): void
    {
        if (!$node->attributes) return;
        /** @var array<string,string|bool> */
        $attributes = [];
        // absorb attributes
        /** @var DOMNode $attribute */
        foreach ($node->attributes as $attribute) {
            if ($attribute->nodeValue) {
                $attributes[$attribute->nodeName] = $attribute->nodeValue;
            } else {
                $attributes[$attribute->nodeName] = true;
            }
        }
        // set attributes
        foreach ($attributes as $k => $v) {
            if ($k == 'id' && is_string($v)) {
                $tag->setID($v);
            } elseif ($k == 'class' && is_string($v)) {
                $tag->classes()->parse($v);
            } elseif ($k == 'style' && is_string($v)) {
                $tag->styles()->parse($v);
            } else {
                // make an effort to set ID
                try {
                    $tag->attributes()["$k"] = $v;
                }
                // it is correct to ignore attributes that are unsettable
                catch (\Throwable $th) { // @codeCoverageIgnore
                    // does nothing
                }
            }
        }
    }

    /**
     * @param string $tag
     * @return class-string<NodeInterface>|null
     */
    protected function tagClass(string $tag): string|null
    {
        // look for an explicitly-set class
        if (isset($this->tag_classes[$tag])) {
            return $this->tag_classes[$tag];
        }
        // otherwise loop through namespaces and try to find a tag
        foreach ($this->tag_namespaces as $namespace) {
            $class = $namespace . ucfirst($tag) . 'Tag';
            if (class_exists($class)) {
                $implements = class_implements($class);
                $implements = $implements ? $implements : [];
                if (in_array(NodeInterface::class, $implements)) {
                    $this->tag_classes[$tag] = $class; // @phpstan-ignore-line
                    return $class; // @phpstan-ignore-line
                }
            }
        }
        // return null if nothing found
        return null;
    }
}
