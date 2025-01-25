<?php

return [
    'api_key' => env('DEEPSEEK_API_KEY'),
    'base_uri' => env('DEEPSEEK_BASE_URI', 'https://api.deepseek.com/v1/'),
    'timeout' => env('DEEPSEEK_TIMEOUT', 30),
    'retries' => env('DEEPSEEK_RETRIES', 3),
];