<?php

namespace Zapheus\Bridge\Illuminate;

use Zapheus\Container\Container;
use Zapheus\Provider\Configuration;

/**
 * Illuminate Provider Test
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class IlluminateProviderTest extends \PHPUnit_Framework_TestCase
{
    const FOOD_PROVIDER = 'Zapheus\Bridge\Illuminate\Fixture\Providers\FoodServiceProvider';

    const TEST_CONTROLLER = 'Zapheus\Bridge\Illuminate\Fixture\Controllers\TestController';

    const TEST_PROVIDER = 'Zapheus\Bridge\Illuminate\Fixture\Providers\TestServiceProvider';

    /**
     * @var \Zapheus\Container\WritableInterface
     */
    protected $container;

    /**
     * @var \Zapheus\Provider\ProviderInterface
     */
    protected $provider;

    /**
     * Sets up the provider instance.
     *
     * @return void
     */
    public function setUp()
    {
        $this->container = new Container;

        $interface = (string) IlluminateProvider::CONFIG;

        $config = new Configuration;

        $this->container->set($interface, $config);
    }

    /**
     * Tests ProviderInterface::register.
     *
     * @return void
     */
    public function testRegisterMethod()
    {
        $providers = array(self::FOOD_PROVIDER, self::TEST_PROVIDER);

        $provider = new IlluminateProvider($providers);

        $container = $provider->register($this->container);

        $container = $container->get(IlluminateProvider::CONTAINER);

        $expected = (string) self::TEST_CONTROLLER;

        $result = $container->make('test');

        $this->assertInstanceOf($expected, $result);
    }
}
