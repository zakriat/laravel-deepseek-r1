<?php

namespace Zakriat\DeepseekR1\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Zakriat\DeepseekR1\Contracts\DeepseekClientInterface chatCompletion(array $params)
 * @method static \Zakriat\DeepseekR1\Contracts\DeepseekClientInterface embeddings(array $params)
 * 
 * @see \Zakriat\DeepseekR1\DeepseekClient
 */
class DeepseekR1 extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'deepseek-r1'; // Must match service container binding
    }
}