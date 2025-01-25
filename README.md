# Laravel Deepseek R1 Integration

[![Latest Version](https://img.shields.io/packagist/v/zakriat/laravel-deepseek-r1.svg?style=flat-square)](https://packagist.org/packages/zakriat/laravel-deepseek-r1)
[![Tests](https://github.com/zakriat/laravel-deepseek-r1/actions/workflows/tests.yml/badge.svg)](https://github.com/zakriat/laravel-deepseek-r1/actions/workflows/tests.yml)

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

## Usage
```code
$response = DeepseekR1::chatCompletion([
    'model' => 'deepseek-r1',
    'messages' => [
        ['role' => 'user', 'content' => 'Explain quantum computing in simple terms']
    ]
]);