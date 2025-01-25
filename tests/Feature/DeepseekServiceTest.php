<?php

namespace Zakriat\DeepseekR1\Tests\Feature;

use Zakriat\DeepseekR1\Facades\DeepseekR1; // Add this line
use Zakriat\DeepseekR1\Tests\TestCase;

class DeepseekServiceTest extends TestCase
{
    public function test_facade_works()
    {
        $client = DeepseekR1::getFacadeRoot();
        $this->assertInstanceOf(
            \Zakriat\DeepseekR1\Contracts\DeepseekClientInterface::class,
            $client
        );
    }
}