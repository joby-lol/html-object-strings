<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Multimedia;

use Joby\HTML\Containers\ContainerGroup;
use Joby\HTML\Tags\AbstractGroupedTag;

/**
 * The <picture> HTML element contains zero or more <source> elements and one <img> element to offer alternative versions of an image for different display/device scenarios.
 * 
 * The browser will consider each child <source> element and choose the best match among them. If no matches are found—or the browser doesn't support the <picture> element—the URL of the <img> element's src attribute is selected. The selected image is then presented in the space occupied by the <img> element.
 * 
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/picture
 */
class PictureTag extends AbstractGroupedTag
{

    const TAG = "picture";

    /**
     * @var ContainerGroup<SourceTag> $sources
     */
    protected ContainerGroup $sources;

    /**
     * @var ContainerGroup<ImgTag> $img
     */
    protected ContainerGroup $img;

    public function __construct()
    {
        parent::__construct();
        $this->sources = ContainerGroup::ofClass(SourceTag::class);
        $this->img = ContainerGroup::ofClass(ImgTag::class, 1);
        $this->addGroup($this->sources);
        $this->addGroup($this->img);
    }

}
