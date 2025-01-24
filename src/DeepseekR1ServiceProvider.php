<?php

namespace Zakriat\DeepseekR1;

use Illuminate\Support\ServiceProvider;

class DeepseekR1ServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/deepseek-r1.php', 'deepseek-r1');
        
        $this->app->singleton('deepseek-r1', function ($app) {
            return new DeepseekClient(
                config('deepseek-r1.api_key'),
                config('deepseek-r1.base_uri')
            );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/deepseek-r1.php' => config_path('deepseek-r1.php'),
        ], 'deepseek-config');
    }
}