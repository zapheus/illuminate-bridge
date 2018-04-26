<?php

namespace Zapheus\Bridge\Illuminate;

use Zapheus\Container\Container;
use Zapheus\Provider\Configuration;

/**
 * Bridge Provider Test
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BridgeProviderTest extends \PHPUnit_Framework_TestCase
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

        $interface = (string) BridgeProvider::CONFIG;

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

        $provider = new BridgeProvider((array) $providers);

        $container = $provider->register($this->container);

        $container = $container->get(BridgeProvider::CONTAINER);

        $expected = (string) self::TEST_CONTROLLER;

        $result = $container->make((string) 'test');

        $this->assertInstanceOf($expected, $result);
    }
}
