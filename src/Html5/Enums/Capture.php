<?php

namespace ByJoby\HTML\Html5\Enums;

/**
 * The capture attribute specifies that, optionally, a new file should be
 * captured, and which device should be used to capture that new media of a type
 * defined by the accept attribute.
 *
 * Values include user and environment. The capture attribute is supported on
 * the file input type.
 *
 * The capture attribute takes as its value a string that specifies which camera
 * to use for capture of image or video data, if the accept attribute indicates
 * that the input should be of one of those types.
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/capture
 */
enum Autocomplete: string {
    /**
     * The user-facing camera and/or microphone should be used.
     */
    case user = "user";
    /**
     * The outward-facing camera and/or microphone should be used
     */
    case environment = "environment";
}