<?php

namespace Zakriat\DeepseekR1\Tests;

use Zakriat\DeepseekR1\DeepseekClient;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class DeepseekTest extends TestCase
{
    public function test_client_initialization()
    {
        $client = new DeepseekClient('test-key', 'https://api.deepseek.com/v1/');
        $this->assertInstanceOf(DeepseekClient::class, $client);
    }

    public function test_api_request()
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