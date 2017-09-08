<?php

namespace Bitaac\ThemeDefault;

use Bitaac\Core\Providers\AggregateServiceProvider;

class ThemeDefaultServiceProvider extends AggregateServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'bitaac');

        $this->publishes([
            __DIR__.'/../public' => public_path('bitaac/theme-default'),
        ], 'bitaac:assets');
    }
}
