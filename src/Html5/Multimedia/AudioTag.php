<?php

namespace ByJoby\HTML\Html5\Multimedia;

/**
 * The <audio> HTML element is used to embed sound content in documents. It may
 * contain one or more audio sources, represented using the src attribute or the
 * <source> element: the browser will choose the most suitable one. It can also
 * be the destination for streamed media, using a MediaStream.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/audio
 */
class AudioTag extends AbstractPlaybackTag
{
    const TAG = 'audio';
}