<?php

namespace Zapheus\Bridge\Illuminate\Fixture\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Test Service Provider
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class TestServiceProvider extends ServiceProvider
{
    /**
     * Registers the service provider.
     *
     * @return void
     */
    public function register()
    {
        $test = 'Zapheus\Bridge\Illuminate\Fixture\Controllers\TestController';

        $this->app->bind('test', $test);
    }
}
