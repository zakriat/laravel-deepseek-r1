<?php

namespace Zakriat\DeepseekR1;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Zakriat\DeepseekR1\Contracts\DeepseekClientInterface;
use Zakriat\DeepseekR1\Exceptions\DeepseekException;

class DeepseekClient implements DeepseekClientInterface
{
    protected $client;
    protected $apiKey;
    protected $timeout;
    protected $maxRetries;

    public function __construct(
        string $apiKey,
        string $baseUri,
        int $timeout = 30,
        int $maxRetries = 3
    ) {
        $this->apiKey = $apiKey;
        $this->timeout = $timeout;
        $this->maxRetries = $maxRetries;

        $this->client = new Client([
            'base_uri' => $baseUri,
            'timeout' => $this->timeout,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]
        ]);
    }

    public function chatCompletion(array $params)
    {
        return $this->request('POST', '/chat/completions', $params);
    }

    public function embeddings(array $params)
    {
        return $this->request('POST', '/embeddings', $params);
    }

    protected function request(string $method, string $endpoint, array $data)
    {
        $retryCount = 0;

        while ($retryCount < $this->maxRetries) {
            try {
                $response = $this->client->request($method, $endpoint, [
                    'json' => $data
                ]);

                return json_decode($response->getBody()->getContents(), true);

            } catch (GuzzleException $e) {
                if ($retryCount === $this->maxRetries - 1) {
                    throw DeepseekException::apiError($e->getMessage(), $e->getCode());
                }
                $retryCount++;
                usleep(500000 * $retryCount); // Exponential backoff
            }
        }
    }

    public function setTimeout(int $seconds)
    {
        $this->timeout = $seconds;
        $this->client = new Client([
            'base_uri' => $this->client->getConfig('base_uri'),
            'timeout' => $this->timeout,
            'headers' => $this->client->getConfig('headers')
        ]);
    }

    public function setRetries(int $retries)
    {
        $this->maxRetries = $retries;
    }
}