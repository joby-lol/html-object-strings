<?php
/* HTML Object Strings | https://gitlab.com/byjoby/html-object-strings | MIT License */
namespace HtmlObjectStrings;

use Flatrr\FlatArray;

class GenericTag extends FlatArray implements HtmlInterface
{
    const TAG = 'span';
    const SELFCLOSING = false;

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        $this->merge([
            'classes' => [],
            'attributes' => []
        ]);
        $this->htmlInit();
    }

    protected function htmlContent()
    {
        if (is_array($this['content'])) {
            $content = implode(PHP_EOL, $this['content']);
        } else {
            $content = $this['content'];
        }
        return $content;
    }

    protected function htmlAttributes()
    {
        $attr = $this['attributes'];
        if ($this->classes()) {
            $attr['class'] = implode(' ', $this->classes());
        }
        return $attr;
    }

    protected function htmlInit()
    {
        $this['tag'] = static::TAG;
        $this['selfclosing'] = static::SELFCLOSING;
    }

    public function addClass(string $name)
    {
        if (!$name) {
            return;
        }
        $classes = $this['classes'];
        $classes[] = $name;
        $classes = array_unique($classes);
        sort($classes);
        unset($this['classes']);
        $this['classes'] = $classes;
    }

    public function hasClass(string $name) : bool
    {
        return in_array($name, $this['classes']);
    }

    public function removeClass(string $name)
    {
        $classes = array_filter(
            $this['classes'],
            function ($e) use ($name) {
                return $e != $name;
            }
        );
        sort($classes);
        unset($this['classes']);
        $this['classes'] = $classes;
    }

    public function classes() : array
    {
        return $this['classes'];
    }

    public function attr(string $name, $value = null)
    {
        if ($value === false) {
            unset($this['attributes.'.$name]);
            return null;
        }
        if ($value !== null) {
            $this['attributes.'.$name] = $value;
        }
        if (isset($this['attributes.'.$name])) {
            return $this['attributes.'.$name];
        }
        return null;
    }

    public function data(string $name, $value = null)
    {
        return $this->attr("data-$name", $value);
    }

    public function string() : string
    {
        $out = '';
        //build opening tag
        $out .= '<'.$this['tag'];
        //build attributes
        if ($attr = $this->htmlAttributes()) {
            foreach ($attr as $key => $value) {
                if (!"$value") {
                    $out .= " $key";
                } else {
                    $value = htmlspecialchars($value);
                    $out .= " $key=\"$value\"";
                }
            }
        }
        //continue t close opening tag and add content and closing tag if needed
        if ($this['selfclosing']) {
            $out .= ' />';
        } else {
            $out .= '>';
            //build content
            $out .= $this->htmlContent();
            //build closing tag
            $out .= '</'.$this['tag'].'>';
        }
        return $out;
    }

    public function __toString()
    {
        return $this->string();
    }
}
