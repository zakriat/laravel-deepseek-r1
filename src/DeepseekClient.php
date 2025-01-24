<?php

namespace Zakriat\DeepseekR1;

use GuzzleHttp\Client;

class DeepseekClient
{
    protected $client;
    protected $apiKey;

    public function __construct(string $apiKey, string $baseUri)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => $baseUri,
            'headers' => [
                'Authorization' => 'Bearer '.$this->apiKey,
                'Content-Type' => 'application/json',
            ]
        ]);
    }

    public function chatCompletion(array $params)
    {
        $response = $this->client->post('/chat/completions', [
            'json' => $params
        ]);
        
        return json_decode($response->getBody(), true);
    }
    
    // Add other API methods as needed
}