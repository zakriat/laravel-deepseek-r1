<?php

namespace Zakriat\DeepseekR1\Tests\Feature;

use Zakriat\DeepseekR1\Facades\DeepseekR1;
use Zakriat\DeepseekR1\Tests\TestCase;

class DeepseekServiceTest extends TestCase
{
    public function test_facade_works()
    {
        $this->assertInstanceOf(
            \Zakriat\DeepseekR1\Contracts\DeepseekClientInterface::class,
            DeepseekR1::getFacadeRoot()
        );
    }
}