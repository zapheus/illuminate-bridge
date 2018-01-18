<?php

namespace Zapheus\Bridge\Illuminate;

use Illuminate\Config\Repository;
use Illuminate\Container\Container as IlluminateContainer;
use Zapheus\Container\WritableInterface;
use Zapheus\Provider\ProviderInterface;

/**
 * Provider
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class Provider implements ProviderInterface
{
    /**
     * @var string
     */
    protected $container = 'Illuminate\Container\Container';

    /**
     * @var string
     */
    protected $provider;

    /**
     * Initializes the provider instance.
     *
     * @param string $provider
     */
    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    /**
     * Registers the bindings in the container.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Zapheus\Container\ContainerInterface
     */
    public function register(WritableInterface $container)
    {
        $illuminate = $this->container($container);

        $provider = new $this->provider($illuminate);

        $provider->register();

        $container->set($this->container, $illuminate);

        return $container;
    }

    /**
     * Returns a \Illuminate\Container\Container instance.
     *
     * @param  \Zapheus\Container\WritableInterface $container
     * @return \Illuminate\Container\Container
     */
    protected function container(WritableInterface $container)
    {
        if ($container->has($this->container) === false) {
            $loader = 'Illuminate\Config\LoaderInterface';

            $laravel = new IlluminateContainer;

            if (interface_exists($loader) === false) {
                $config = $container->get(self::CONFIG);

                $items = $config->get('illuminate', array());

                $laravel['config'] = new Repository($items);
            }

            return $laravel;
        }

        return $container->get($this->container);
    }
}
