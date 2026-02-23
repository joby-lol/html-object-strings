# HTML Object Strings

A comprehensive PHP library for programmatically building HTML. Covers essentially all of HTML5, plus SVG and MathML.

## Installation
```bash
composer require joby/html-object-strings
```

## Usage

Tags live in the `Joby\HTML\Html5` namespace. Find the tag class you need, instantiate it, and use the fluent setters to configure it. Every attribute and behavior is documented in the class and method docblocks, sourced from MDN.

```php
use Joby\HTML\Html5\InlineTextSemantics\ATag;
use Joby\HTML\Html5\TextContentTags\DivTag;
use Joby\HTML\Nodes\Text;

$div = new DivTag();
$div->addChild(
    (new ATag())
        ->setHref('https://example.com')
        ->addChild(new Text('Click here'))
);

echo $div;
```
## Parsing

HTML can be parsed back into the object model using `Html5Parser`. This feature is still somewhat experimental.

```php
use Joby\HTML\Html5\Html5Parser;

$parser = new Html5Parser();

// Parse a fragment into a container of nodes
$fragment = $parser->parseFragment('<div id="foo"><p>Hello</p></div>');

// Parse a full document
$document = $parser->parseDocument('<html><head><title>My Page</title></head><body><div>foo</div></body></html>');
echo $document->html()->head()->title()->content(); // "My Page"
```

Unknown tags and whitespace-only text nodes are silently dropped. Parsed nodes are full objects — attributes, classes, and styles are all accessible and mutable.

The parser is extensible: subclass `AbstractParser` or `Html5Parser` and configure `$tag_namespaces` and `$tag_classes` to support custom tag sets.

## Traversal

Any container — parsed or built programmatically — can be walked recursively using `walk()`. It yields all descendant nodes depth-first, optionally filtered by class:
```php
use Joby\HTML\Html5\InlineTextSemantics\ATag;

// Find all links in a parsed fragment and rewrite their hrefs
foreach ($fragment->walk(ATag::class) as $link) {
    $link->setHref('https://proxy.example.com?url=' . urlencode($link->href()));
}

// Walk all nodes without filtering
foreach ($fragment->walk() as $node) {
    echo get_class($node) . PHP_EOL;
}
```

## Requirements

Fully tested on PHP 8.3+, static analysis for PHP 8.1.

## License

MIT License - See [LICENSE](LICENSE) file for details.