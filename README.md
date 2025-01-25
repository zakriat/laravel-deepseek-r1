# Laravel Deepseek R1 Integration

[![Latest Version](https://img.shields.io/packagist/v/zakriat/laravel-deepseek-r1.svg?style=flat-square)](https://packagist.org/packages/zakriat/laravel-deepseek-r1)


Professional Laravel integration for Deepseek R1 API with Guzzle HTTP client.

## Features

- Laravel Service Provider & Facade
- Configurable timeouts and retries
- Full exception handling
- Ready for horizontal scaling
- PSR-4 compliant structure
- Comprehensive test suite

## Installation

```bash
composer require zakriat/laravel-deepseek-r1

# Publish config file 
php artisan vendor:publish --provider="Zakriat\DeepseekR1\DeepseekServiceProvider"
```

## Usage

```php
use Zakriat\DeepseekR1\Facades\DeepseekR1;

// In your controller or service
$response = DeepseekR1::chatCompletion([
    'model' => 'deepseek-r1',
    'messages' => [
        ['role' => 'user', 'content' => 'Explain quantum computing in simple terms']
    ]
]);

// Access response content
echo $response['choices'][0]['message']['content'];
```

## Configuration

Add to your `.env`:
```
DEEPSEEK_API_KEY=your_api_key_here
DEEPSEEK_BASE_URI=https://api.deepseek.com/v1/
DEEPSEEK_TIMEOUT=30  # seconds
DEEPSEEK_RETRIES=3   # retry attempts
```
