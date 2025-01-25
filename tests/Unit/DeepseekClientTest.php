<?php

namespace Zakriat\DeepseekR1\Tests\Unit;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Zakriat\DeepseekR1\DeepseekClient;
use Zakriat\DeepseekR1\Tests\TestCase;

class DeepseekClientTest extends TestCase
{
    public function test_chat_completion()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode([
                'choices' => [['message' => ['content' => 'Test response']]]
            ]))
        ]);

        $client = new DeepseekClient('test-key', 'https://api.deepseek.com/v1/', [
            'handler' => HandlerStack::create($mock)
        ]);

        $response = $client->chatCompletion([
            'messages' => [['role' => 'user', 'content' => 'Hello']]
        ]);

        $this->assertArrayHasKey('choices', $response);
        $this->assertEquals('Test response', $response['choices'][0]['message']['content']);
    }
}