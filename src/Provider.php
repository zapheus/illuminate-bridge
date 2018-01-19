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
    const CONTAINER = 'Illuminate\Container\Container';

    const LOADER = 'Illuminate\Config\LoaderInterface';

    /**
     * @var string[]
     */
    protected $providers;

    /**
     * Initializes the provider instance.
     *
     * @param string[] $providers
     */
    public function __construct(array $providers)
    {
        $this->providers = $providers;
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

        foreach ($this->providers as $item) {
            $provider = new $item($illuminate);

            $provider->register();
        }

        $container->set(self::CONTAINER, $illuminate);

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
        $laravel = new IlluminateContainer;

        if (interface_exists(self::LOADER) === false) {
            $config = $container->get(self::CONFIG);

            $items = $config->get('illuminate', array());

            $laravel['config'] = new Repository($items);
        }

        return $laravel;
    }
}
