<?php

namespace ByJoby\HTML\Html5\Multimedia\AbstractPlaybackTag;

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