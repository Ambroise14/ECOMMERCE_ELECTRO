<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'filterajax','addtocart','updatecart','pagar','all','removecart','details_order','details_endereco_user','seach','deleteitemcart' ,'showmodal','dd-new-adress-data'
    ];
}
