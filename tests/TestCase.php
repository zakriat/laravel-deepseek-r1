<?php

namespace Zakriat\DeepseekR1\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Zakriat\DeepseekR1\DeepseekServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function setUp(): void
    {
        parent::setUp(); // Crucial for proper initialization
        $this->artisan('config:clear');
    }

    protected function getPackageProviders($app)
    {
        return [
            \Zakriat\DeepseekR1\DeepseekServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'DeepseekR1' => \Zakriat\DeepseekR1\Facades\DeepseekR1::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('deepseek-r1', [
            'api_key' => 'test-key',
            'base_uri' => 'https://api.test.deepseek.com/',
            'timeout' => 30,
            'retries' => 3
        ]);
    }
}