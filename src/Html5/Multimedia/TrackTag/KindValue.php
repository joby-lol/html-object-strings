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

namespace Joby\HTML\Html5\Multimedia\TrackTag;

/**
 * How the text track is meant to be used. If omitted the default kind is
 * subtitles. If the attribute contains an invalid value, it will use metadata
 * (Versions of Chrome earlier than 52 treated an invalid value as subtitles).
 * The following keywords are allowed:
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/track
 */
enum KindValue: string
{
    /**
     * Subtitles provide translation of content that cannot be understood by the
     * viewer. For example speech or text that is not English in an English
     * language film.
     *
     * Subtitles may contain additional content, usually extra background
     * information. For example the text at the beginning of the Star Wars
     * films, or the date, time, and location of a scene.
     */
    case subtitles = "subtitles";
    /**
     * Closed captions provide a transcription and possibly a translation of
     * audio.
     *
     * It may include important non-verbal information such as music cues or
     * sound effects. It may indicate the cue's source (e.g. music, text,
     * character).
     *
     * Suitable for users who are deaf or when the sound is muted.
     */
    case captions = "captions";
    /**
     * Textual description of the video content.
     *
     * Suitable for users who are blind or where the video cannot be seen.
     */
    case descriptions = "descriptions";
    /**
     * Chapter titles are intended to be used when the user is navigating the
     * media resource.
     */
    case chapters = "chapters";
    /**
     * Tracks used by scripts. Not visible to the user.
     */
    case metadata = "metadata";
}