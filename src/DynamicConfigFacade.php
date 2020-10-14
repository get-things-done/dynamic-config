<?php

namespace GetThingsDone\DynamicConfig;

use Illuminate\Support\Facades\Config;

/**
 * @see \GetThingsDone\DynamicConfig\DynamicConfig
 *
 */
class DynamicConfigFacade extends Config
{
    protected static function getFacadeAccessor()
    {
        return 'dynamic-config';
    }
}
