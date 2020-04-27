<?php

namespace Revolution\OpenBD\Facades;

use Illuminate\Support\Facades\Facade;
use Revolution\OpenBD\Contracts\Factory;

class OpenBD extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Factory::class;
    }
}
