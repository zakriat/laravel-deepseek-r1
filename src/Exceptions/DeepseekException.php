<?php

namespace Zakriat\DeepseekR1\Exceptions;

use Exception;

class DeepseekException extends Exception
{
    public static function apiError(string $message, int $code = 500): self
    {
        return new static("Deepseek API Error: {$message}", $code);
    }
}