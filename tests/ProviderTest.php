<?php

namespace Zapheus\Bridge\Illuminate;

use Zapheus\Container\Container;
use Zapheus\Provider\Configuration;
use Zapheus\Provider\FrameworkProvider;

/**
 * Provider Test
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ProviderTest extends \PHPUnit_Framework_TestCase
{
    const FOOD_PROVIDER = 'Zapheus\Bridge\Illuminate\Fixture\Providers\FoodServiceProvider';

    const TEST_PROVIDER = 'Zapheus\Bridge\Illuminate\Fixture\Providers\TestServiceProvider';

    /**
     * @var \Zapheus\Container\WritableInterface
     */
    protected $container;

    /**
     * @var \Zapheus\Provider\FrameworkProvider
     */
    protected $framework;

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
        $message = 'Illuminate Container is not yet installed.';

        $container = 'Illuminate\Container\Container';

        class_exists($container) || $this->markTestSkipped($message);

        $this->container = new Container;

        $class = 'Zapheus\Provider\ConfigurationInterface';

        $config = new Configuration;

        $this->container->set($class, $config);

        $this->framework = new FrameworkProvider;
    }

    /**
     * Tests ProviderInterface::register.
     *
     * @return void
     */
    public function testRegisterMethod()
    {
        $fooo = new Provider(self::FOOD_PROVIDER);

        $test = new Provider(self::TEST_PROVIDER);

        $container = $fooo->register($this->container);

        $container = $test->register($container);

        $container = $this->framework->register($container);

        $expected = 'Zapheus\Bridge\Illuminate\Fixture\Controllers\TestController';

        $result = $container->get('test');

        $this->assertInstanceOf($expected, $result);
    }
}
