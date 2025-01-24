<?php

namespace Zakriat\DeepseekR1\Tests;

use Zakriat\DeepseekR1\DeepseekClient;
use PHPUnit\Framework\TestCase;

class DeepseekTest extends TestCase
{
    public function test_client_initialization()
    {
        $client = new DeepseekClient('test-key', 'https://api.deepseek.com/v1/');
        $this->assertInstanceOf(DeepseekClient::class, $client);
    }
}