<?php

namespace LaravelMailChimp;

use Illuminate\Support\Facades\Facade;

class MailchimpFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Mailchimp';
    }
}
