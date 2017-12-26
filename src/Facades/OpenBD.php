<?php

namespace Revolution\OpenBD\Facades;

use Illuminate\Support\Facades\Facade;

use Revolution\OpenBD\OpenBDInterface;

class OpenBD extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return OpenBDInterface::class;
    }
}
