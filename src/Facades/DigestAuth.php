<?php

namespace Darkin1\DigestAuth\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Intercom.
 */
class DigestAuth extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'DigestAuth';
    }
}
