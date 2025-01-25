<?php

namespace Zakriat\DeepseekR1\Tests\Unit;

use Zakriat\DeepseekR1\DeepseekClient;
use Zakriat\DeepseekR1\Tests\TestCase;

class DeepseekClientTest extends TestCase
{
    public function test_chat_completion()
    {
        $client = new DeepseekClient(
            'test-key',
            'https://api.deepseek.com/v1/'
        );

        $this->assertInstanceOf(DeepseekClient::class, $client);
    }
}