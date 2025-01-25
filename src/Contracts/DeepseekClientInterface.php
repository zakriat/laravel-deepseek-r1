<?php

namespace Zakriat\DeepseekR1\Contracts;

interface DeepseekClientInterface
{
    public function chatCompletion(array $params);
    public function embeddings(array $params);
    public function setTimeout(int $seconds);
    public function setRetries(int $retries);
}