<?php

namespace Altelma\LaravelMailChimp;

use Illuminate\Support\Facades\Facade;

class LaravelMailChimpFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'MailChimp';
    }
}
