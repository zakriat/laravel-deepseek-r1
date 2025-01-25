<?php

namespace Zakriat\DeepseekR1\Facades;

use Illuminate\Support\Facades\Facade;

class DeepseekR1 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Zakriat\DeepseekR1\Contracts\DeepseekClientInterface::class;
    }
}