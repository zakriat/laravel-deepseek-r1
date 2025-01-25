<?php

namespace Zakriat\DeepseekR1;

use Illuminate\Support\ServiceProvider;
use Zakriat\DeepseekR1\Contracts\DeepseekClientInterface;

class DeepseekServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/deepseek-r1.php', 'deepseek-r1');
        
        $this->app->singleton(DeepseekClientInterface::class, function ($app) {
            return new DeepseekClient(
                config('deepseek-r1.api_key'),
                config('deepseek-r1.base_uri'),
                config('deepseek-r1.timeout', 30),
                config('deepseek-r1.retries', 3)
            );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/deepseek-r1.php' => config_path('deepseek-r1.php'),
        ], 'deepseek-config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                // Add commands here if needed
            ]);
        }
    }
}