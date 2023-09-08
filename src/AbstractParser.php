<?php

namespace ByJoby\HTML;

use ByJoby\HTML\Containers\Fragment;
use ByJoby\HTML\Containers\FragmentInterface;
use ByJoby\HTML\Containers\HtmlDocumentInterface;
use ByJoby\HTML\Html5\Enums\BooleanAttribute;
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

/**
 * Extensions of this class to create new parsers are primarily meant to be
 * controlled by adjusting the default properties below
 */
abstract class AbstractParser
{
    /** 
     * A list of namespaces in which to match tags. To match in this way the
     * tag classes must implement TagInterface and be named following the
     * convention of the tag name in CamelCase followed by "Tag" i.e. a class
     * implementing a tag <my-tag> would need to be named MyTagTag.
     * 
     * They are searched in order and the first match is used.
     * 
     * @var array<int,string>
     */
    protected $tag_namespaces = [];

    /** 
     * A list of defined tag classes, matching a tag string (in lower case) to
     * a fully-qualified TagInterface-implementing class. This array is also
     * used at runtime to cache the pairings found and verified from 
     * $tag_namespaces.
     * 
     * They are searched in order and the first match is used.
     * 
     * @var array<string,class-string<TagInterface>>
     */
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
        $fragment = new($this->fragment_class);
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
        // @phpstan-ignore-next-line we actually do know there's an item zero
        $this->walkDom($dom->childNodes->item(0), $fragment);
        return $fragment;
    }

    public function parseDocument(string $html): HtmlDocumentInterface
    {
        /** @var HtmlDocumentInterface */
        $document = new($this->document_class);
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
            return new($this->comment_class)($node->textContent);
        } elseif ($node instanceof DOMText) {
            $content = trim($node->textContent);
            if ($content) {
                return new($this->text_class)($content);
            }
        }
        // It's philosophically consistent to simply ignore unknown node types
        return null;
    }

    protected function convertNodeToTag(DOMElement $node): null|NodeInterface
    {
        // build object
        $class = $this->tagClass($node->tagName);
        if (!$class) {
            return null;
        }
        $tag = new $class();
        // tool for setting up content tags
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
        $attributes = [];
        // absorb attributes from DOMNode
        /** @var DOMNode $attribute */
        foreach ($node->attributes ?? [] as $attribute) {
            if ($attribute->nodeValue) {
                $attributes[$attribute->nodeName] = $attribute->nodeValue;
            } else {
                $attributes[$attribute->nodeName] = BooleanAttribute::true;
            }
        }
        // set attributes internally
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
                } catch (\Throwable $th) { // @codeCoverageIgnore
                    // does nothing
                    // it is correct to ignore attributes that are unsettable
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