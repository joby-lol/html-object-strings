<?php

namespace ByJoby\HTML\Html5\Tags;

use ByJoby\HTML\Helpers\BooleanAttribute;
use ByJoby\HTML\Html5\Tags\ScriptTag\ReferrerPolicyValue;
use ByJoby\HTML\Html5\Tags\ScriptTag\TypeValue;
use ByJoby\HTML\Html5\Traits\CrossOriginTrait;
use ByJoby\HTML\Tags\AbstractContentTag;
use Stringable;

/**
 * The <script> HTML element is used to embed executable code or data; this is
 * typically used to embed or refer to JavaScript code. The <script> element can
 * also be used with other languages, such as WebGL's GLSL shader programming
 * language and JSON.
 *
 * Tag description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script
 */
class ScriptTag extends AbstractContentTag
{
    use CrossOriginTrait;
    const TAG = 'script';

    /**
     * For classic scripts, if the async attribute is present, then the classic
     * script will be fetched in parallel to parsing and evaluated as soon as it
     * is available.
     *
     * For module scripts, if the async attribute is present then the scripts
     * and all their dependencies will be executed in the defer queue, therefore
     * they will get fetched in parallel to parsing and evaluated as soon as
     * they are available.
     *
     * This attribute allows the elimination of parser-blocking JavaScript where
     * the browser would have to load and evaluate scripts before continuing to
     * parse. defer has a similar effect in this case.
     *
     * @param boolean $async
     * @return static
     */
    public function setAsync(bool $async): self
    {
        if ($async) $this->attributes()['async'] = BooleanAttribute::true;
        else unset($this->attributes()['async']);
        return $this;
    }

    /**
     * For classic scripts, if the async attribute is present, then the classic
     * script will be fetched in parallel to parsing and evaluated as soon as it
     * is available.
     *
     * For module scripts, if the async attribute is present then the scripts
     * and all their dependencies will be executed in the defer queue, therefore
     * they will get fetched in parallel to parsing and evaluated as soon as
     * they are available.
     *
     * This attribute allows the elimination of parser-blocking JavaScript where
     * the browser would have to load and evaluate scripts before continuing to
     * parse. defer has a similar effect in this case.
     *
     * @return boolean
     */
    public function async(): bool
    {
        return $this->attributes()['async'] === BooleanAttribute::true;
    }

    /**
     * This Boolean attribute is set to indicate to a browser that the script is
     * meant to be executed after the document has been parsed, but before
     * firing DOMContentLoaded.
     *
     * Scripts with the defer attribute will prevent the DOMContentLoaded event
     * from firing until the script has loaded and finished evaluating.
     *
     * @param boolean $defer
     * @return static
     */
    public function setDefer(bool $defer): self
    {
        if ($defer) $this->attributes()['defer'] = BooleanAttribute::true;
        else unset($this->attributes()['defer']);
        return $this;
    }

    /**
     * This Boolean attribute is set to indicate to a browser that the script is
     * meant to be executed after the document has been parsed, but before
     * firing DOMContentLoaded.
     *
     * Scripts with the defer attribute will prevent the DOMContentLoaded event
     * from firing until the script has loaded and finished evaluating.
     *
     * @return boolean
     */
    public function defer(): bool
    {
        return $this->attributes()['defer'] === BooleanAttribute::true;
    }

    /**
     * This attribute contains inline metadata that a user agent can use to
     * verify that a fetched resource has been delivered free of unexpected
     * manipulation. See Subresource Integrity.
     *
     * https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity
     *
     * @return null|string|Stringable
     */
    public function integrity(): null|string|Stringable
    {
        return $this->attributes()->asString('integrity');
    }

    /**
     * This attribute contains inline metadata that a user agent can use to
     * verify that a fetched resource has been delivered free of unexpected
     * manipulation. See Subresource Integrity.
     *
     * https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity
     *
     * @param null|string|Stringable $integrity
     * @return static
     */
    public function setIntegrity(null|string|Stringable $integrity): self
    {
        if ($integrity) $this->attributes()['integrity'] = $integrity;
        else $this->unsetIntegrity();
        return $this;
    }

    /**
     * This attribute contains inline metadata that a user agent can use to
     * verify that a fetched resource has been delivered free of unexpected
     * manipulation. See Subresource Integrity.
     *
     * https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity
     *
     * @return static
     */
    public function unsetIntegrity(): self
    {
        unset($this->attributes()['integrity']);
        return $this;
    }

    /**
     * This Boolean attribute is set to indicate that the script should not be
     * executed in browsers that support ES modules — in effect, this can be
     * used to serve fallback scripts to older browsers that do not support
     * modular JavaScript code.
     *
     * @param boolean $nomodule
     * @return static
     */
    public function setNomodule(bool $nomodule): self
    {
        if ($nomodule) $this->attributes()['nomodule'] = BooleanAttribute::true;
        else unset($this->attributes()['nomodule']);
        return $this;
    }

    /**
     * This Boolean attribute is set to indicate that the script should not be
     * executed in browsers that support ES modules — in effect, this can be
     * used to serve fallback scripts to older browsers that do not support
     * modular JavaScript code.
     *
     * @return boolean
     */
    public function nomodule(): bool
    {
        return $this->attributes()['nomodule'] === BooleanAttribute::true;
    }

    /**
     * A cryptographic nonce (number used once) to allow scripts in a script-src
     * Content-Security-Policy. The server must generate a unique nonce value
     * each time it transmits a policy. It is critical to provide a nonce that
     * cannot be guessed as bypassing a resource's policy is otherwise trivial.
     *
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src
     *
     * @return null|string
     */
    public function nonce(): null|string|Stringable
    {
        return $this->attributes()->asString('nonce');
    }

    /**
     * A cryptographic nonce (number used once) to allow scripts in a script-src
     * Content-Security-Policy. The server must generate a unique nonce value
     * each time it transmits a policy. It is critical to provide a nonce that
     * cannot be guessed as bypassing a resource's policy is otherwise trivial.
     *
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src
     *
     * @param null|string|Stringable $nonce
     * @return static
     */
    public function setNonce(null|string|Stringable $nonce): self
    {
        if ($nonce) $this->attributes()['nonce'] = $nonce;
        else $this->unsetNonce();
        return $this;
    }

    /**
     * A cryptographic nonce (number used once) to allow scripts in a script-src
     * Content-Security-Policy. The server must generate a unique nonce value
     * each time it transmits a policy. It is critical to provide a nonce that
     * cannot be guessed as bypassing a resource's policy is otherwise trivial.
     *
     * https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/script-src
     *
     * @return static
     */
    public function unsetNonce(): self
    {
        unset($this->attributes()['nonce']);
        return $this;
    }

    /**
     * Indicates which referrer to send when fetching the script, or resources
     * fetched by the script.
     *
     * @return null|ReferrerPolicyValue
     */
    public function referrerpolicy(): null|ReferrerPolicyValue
    {
        return $this->attributes()->asEnum('referrerpolicy', ReferrerPolicyValue::class);
    }

    /**
     * Indicates which referrer to send when fetching the script, or resources
     * fetched by the script.
     *
     * @param null|ReferrerPolicyValue $referrerpolicy
     * @return static
     */
    public function setReferrerpolicy(null|ReferrerPolicyValue $referrerpolicy): self
    {
        if ($referrerpolicy) $this->attributes()['referrerpolicy'] = $referrerpolicy->value;
        else $this->unsetReferrerpolicy();
        return $this;
    }

    /**
     * Indicates which referrer to send when fetching the script, or resources
     * fetched by the script.
     *
     * @return static
     */
    public function unsetReferrerpolicy(): self
    {
        unset($this->attributes()['referrerpolicy']);
        return $this;
    }

    /**
     * This attribute specifies the URI of an external script; this can be used
     * as an alternative to embedding a script directly within a document.
     *
     * @return null|string|Stringable
     */
    public function src(): null|string|Stringable
    {
        return $this->attributes()->asString('src');
    }

    /**
     * This attribute specifies the URI of an external script; this can be used
     * as an alternative to embedding a script directly within a document.
     *
     * @param null|string|Stringable $src
     * @return static
     */
    public function setSrc(null|string|Stringable $src): self
    {
        if ($src) $this->attributes()['src'] = $src;
        else $this->unsetSrc();
        return $this;
    }

    /**
     * This attribute specifies the URI of an external script; this can be used
     * as an alternative to embedding a script directly within a document.
     *
     * @return static
     */
    public function unsetSrc(): self
    {
        unset($this->attributes()['src']);
        return $this;
    }

    /**
     * This attribute indicates the type of script represented.
     *
     * @return null|TypeValue
     */
    public function type(): null|TypeValue
    {
        return $this->attributes()->asEnum('type', TypeValue::class);
    }

    /**
     * This attribute indicates the type of script represented.
     *
     * @param null|TypeValue $type
     * @return static
     */
    public function setType(null|TypeValue $type): self
    {
        if ($type) $this->attributes()['type'] = $type->value;
        else $this->unsetType();
        return $this;
    }

    /**
     * This attribute indicates the type of script represented.
     *
     * @return static
     */
    public function unsetType(): self
    {
        unset($this->attributes()['type']);
        return $this;
    }
}