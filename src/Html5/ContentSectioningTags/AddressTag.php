<?php

namespace ByJoby\HTML\Html5\ContentSectioningTags;

use ByJoby\HTML\Tags\AbstractContainerTag;

/**
 * The <address> HTML element indicates that the enclosed HTML provides contact
 * information for a person or people, or for an organization.
 *
 * The contact information provided by an <address> element's contents can take
 * whatever form is appropriate for the context, and may include any type of
 * contact information that is needed, such as a physical address, URL, email
 * address, phone number, social media handle, geographic coordinates, and so
 * forth. The <address> element should include the name of the person, people,
 * or organization to which the contact information refers.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/address
 */
class AddressTag extends AbstractContainerTag
{
    const TAG = 'address';
}
