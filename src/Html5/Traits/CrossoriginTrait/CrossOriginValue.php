<?php

namespace ByJoby\HTML\Html5\Traits\CrossoriginTrait;

enum CrossOriginValue: string
{
    /**
     * A cross-origin request (i.e. with an Origin HTTP header) is performed,
     * but no credential is sent (i.e. no cookie, X.509 certificate, or HTTP
     * Basic authentication). If the server does not give credentials to the
     * origin site (by not setting the Access-Control-Allow-Origin HTTP header)
     * the resource will be tainted and its usage restricted. 
     * 
     * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
     * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
     */
    case anonymous = 'anonymous';

    /**
     * A cross-origin request (i.e. with an Origin HTTP header) is performed
     * along with a credential sent (i.e. a cookie, certificate, and/or HTTP
     * Basic authentication is performed). If the server does not give
     * credentials to the origin site (through Access-Control-Allow-Credentials
     * HTTP header), the resource will be tainted and its usage restricted. 
     *
     * Description by Mozilla Contributors licensed under CC-BY-SA 2.5
     * https://developer.mozilla.org/en-US/docs/Web/HTML/Element/link
     */
    case useCredentials = 'use-credentials';
}