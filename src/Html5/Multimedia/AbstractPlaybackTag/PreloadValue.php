<?php

/**
 * HTML Object Strings
 * https://github.com/joby-lol/html-object-strings
 * (c) 2024-2026 Joby Elliott code@joby.lol
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Joby\HTML\Html5\Multimedia\AbstractPlaybackTag;

enum PreloadValue: string
{
    /**
     * Indicates that the content should not be preloaded.
     */
    case none = "none";
    /**
     * Advised option for most cases. Indicates that only content metadata (e.g.
     * length) is fetched.
     */
    case metadata = "metadata";
    /**
     * Indicates that the whole content file can be downloaded, even if the user
     * is not expected to use it.
     */
    case auto = "auto";
}