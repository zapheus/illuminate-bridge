<?php

namespace Zapheus\Bridge\Illuminate;

use Illuminate\Container\Container as IlluminateContainer;
use Zapheus\Container\ContainerInterface;

/**
 * Container
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class Container implements ContainerInterface
{
    /**
     * @var \Illuminate\Container\Container
     */
    protected $container;

    /**
     * Initializes the container instance.
     *
     * @param \Illuminate\Container\Container $container
     */
    public function __construct(IlluminateContainer $container)
    {
        $this->container = $container;
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param  string $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->container->make($id);
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     *
     * @param  string $id
     * @return boolean
     */
    public function has($id)
    {
        return $this->container->bound($id);
    }

    /**
     * Calls methods from \Illuminate\Container\Container.
     *
     * @param  string $method
     * @param  mixed  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $instance = array($this->container, $method);

        return call_user_func_array($instance, $parameters);
    }
}
