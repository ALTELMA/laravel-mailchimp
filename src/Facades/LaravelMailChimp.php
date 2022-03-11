<?php

namespace Altelma\LaravelMailChimp\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelMailChimp extends Facade
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
