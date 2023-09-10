<?php

namespace ByJoby\HTML\Html5\Multimedia\ImgTag;

enum DecodingValue: string {
    /**
     * No preference for the decoding mode; the browser decides what is best for the user. This is the default value.
     */
    case auto = "auto";
    /**
     * Decode the image synchronously along with rendering the other DOM content, and present everything together.
     */
    case sync = "sync";
    /**
     * Decode the image asynchronously, after rendering and presenting the other DOM content.
     */
    case async = "async";
}