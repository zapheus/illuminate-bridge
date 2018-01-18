<?php

namespace Zapheus\Bridge\Illuminate;

use Illuminate\Container\Container as IlluminateContainer;
use Zapheus\Bridge\Illuminate\Fixture\Controllers\FoodController;

/**
 * Container Test
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class ContainerTest extends \PHPUnit_Framework_TestCase
{
    const FOOD_CONTROLLER = 'Zapheus\Bridge\Illuminate\Fixture\Controllers\FoodController';

    /**
     * @var \Zapheus\Container\ContainerInterface
     */
    protected $container;

    /**
     * Sets up the container instance.
     */
    public function setUp()
    {
        $container = new IlluminateContainer;

        $container->bind('food', new FoodController);

        $this->container = new Container($container);
    }

    /**
     * Tests ContainerInterface::get.
     *
     * @return void
     */
    public function testGetMethod()
    {
        $expected = get_class(new FoodController);

        $result = $this->container->get(self::FOOD_CONTROLLER);

        $this->assertInstanceOf($expected, $result);
    }

    /**
     * Tests ContainerInterface::has.
     *
     * @return void
     */
    public function testHasMethod()
    {
        $this->assertTrue($this->container->has('food'));
    }
}
