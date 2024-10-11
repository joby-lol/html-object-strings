<?php

/**
 * Joby's HTML Object Strings: https://go.joby.lol/htmlobjectstrings
 * MIT License: Copyright (c) 2024 Joby Elliott
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE 
 * SOFTWARE.
 */

namespace Joby\HTML\Html5\Enums;

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