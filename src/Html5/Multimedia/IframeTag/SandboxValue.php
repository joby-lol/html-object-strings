<?php

namespace ByJoby\HTML\Html5\Multimedia\IframeTag;

/**
 * Controls the restrictions applied to the content embedded in the <iframe>.
 * The value of the attribute can either be empty to apply all restrictions, or
 * space-separated tokens to lift particular restrictions:
 *
 * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
 * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/iframe
 */
enum SandboxValue: string
{
    case denyAll = "";
    /**
     * Allows downloading files through an <a> or <area> element with the
     * download attribute, as well as through the navigation that leads to a
     * download of a file. This works regardless of whether the user clicked on
     * the link, or JS code initiated it without user interaction.
     */
    case allowDownloads = "allow-downloads";
    /**
     * Allows for downloads to occur without a gesture from the user.
     *
     * @experimental
     */
    case allowDownloadsWithoutInteraction = "allow-downloads-without-user-activation";
    /**
     * Allows the page to submit forms. If this keyword is not used, form will
     * be displayed as normal, but submitting it will not trigger input
     * validation, sending data to a web server or closing a dialog.
     */
    case allowForms = "allow-forms";
    /**
     * Allows the page to open modal windows by Window.alert(),
     * Window.confirm(), Window.print() and Window.prompt(), while opening a
     * <dialog> is allowed regardless of this keyword. It also allows the page
     * to receive BeforeUnloadEvent event.
     */
    case allowModals = "allow-modals";
    /**
     * Lets the resource lock the screen orientation.
     */
    case allowOrientationLock = "allow-orientation-lock";
    /**
     * Allows the page to use the Pointer Lock API.
     */
    case allowPointerLock = "allow-pointer-lock";
    /**
     * Allows popups (like from Window.open(), target="_blank",
     * Window.showModalDialog()). If this keyword is not used, that
     * functionality will silently fail.
     */
    case allowPopups = "allow-popups";
    /**
     * Allows a sandboxed document to open new windows without forcing the
     * sandboxing flags upon them. This will allow, for example, a third-party
     * advertisement to be safely sandboxed without forcing the same
     * restrictions upon the page the ad links to.
     */
    case allowPopupsToEscapeSandbox = "allow-popups-to-escape-sandbox";
    /**
     * Allows embedders to have control over whether an iframe can start a
     * presentation session.
     */
    case allowPresentation = "allow-presentation";
    /**
     * If this token is not used, the resource is treated as being from a
     * special origin that always fails the same-origin policy (potentially
     * preventing access to data storage/cookies and some JavaScript APIs).
     */
    case allowSameOrigin = "allow-same-origin";
    /**
     * Allows the page to run scripts (but not create pop-up windows). If this
     * keyword is not used, this operation is not allowed.
     */
    case allowScripts = "allow-scripts";
    /**
     * Lets the resource navigate the top-level browsing context (the one named
     * _top).
     */
    case allowTopNavigation = "allow-top-navigation";
    /**
     * Lets the resource navigate the top-level browsing context, but only if
     * initiated by a user gesture.
     */
    case allowTopNavigationByUser = "allow-top-navigation-by-user-activation";
    /**
     * Allows navigations to non-http protocols built into browser or registered
     * by a website. This feature is also activated by allow-popups or
     * allow-top-navigation keyword.
     */
    case allowTopNavigationToCustomProtocols = "allow-top-navigation-to-custom-protocols";

}