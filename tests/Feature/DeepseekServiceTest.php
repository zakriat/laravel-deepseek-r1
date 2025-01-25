<?php

namespace Zakriat\DeepseekR1\Tests\Feature;

use Zakriat\DeepseekR1\Facades\DeepseekR1;
use Zakriat\DeepseekR1\Tests\TestCase;

class DeepseekServiceTest extends TestCase
{
    public function test_facade_works()
{
    // Test service container binding
    $service = app('deepseek-r1');
    $this->assertInstanceOf(\Zakriat\DeepseekR1\DeepseekClient::class, $service);

    // Test facade resolves the same instance
    $facadeInstance = DeepseekR1::getFacadeRoot();
    $this->assertSame($service, $facadeInstance);
}
}