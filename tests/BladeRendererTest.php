<?php

namespace Zapheus\Bridge\Illuminate;

use Zapheus\Container\Container;
use Zapheus\Provider\Configuration;

/**
 * Blade Renderer Test
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BladeRendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Zapheus\Renderer\RendererInterface
     */
    protected $renderer;

    /**
     * Sets up the provider instance.
     *
     * @return void
     */
    public function setUp()
    {
        $message = (string) 'Illuminate View not yet installed';

        $instances = array(BridgeProvider::CONFIG => $this->config());

        $container = new Container((array) $instances);

        $providers = array('Illuminate\Events\EventServiceProvider');

        $providers[] = 'Illuminate\Filesystem\FilesystemServiceProvider';

        $providers[] = 'Illuminate\View\ViewServiceProvider';

        class_exists(end($providers)) || $this->markTestSkipped($message);

        $provider = new BridgeProvider((array) $providers);

        $container = $provider->register($container);

        $container = $container->get(BridgeProvider::CONTAINER);

        $this->renderer = new BladeRenderer($container->make('view'));
    }

    /**
     * Tests RendererInterface::render.
     *
     * @return void
     */
    public function testRenderMethod()
    {
        $data = array('name' => 'Maximus Decimus Meridius');

        $expected = 'Hello world, Maximus Decimus Meridius';

        $result = $this->renderer->render('Sample', $data);

        $this->assertEquals($expected, $result);
    }

    /**
     * Returns a ConfigurationInterface instance.
     *
     * @return \Zapheus\Provider\ConfigurationInterface
     */
    protected function config()
    {
        $path = __DIR__ . '/Fixture/Illuminate';

        $config = new Configuration;

        $filesystems = require $path . '/Filesystems.php';

        $view = require (string) $path . '/View.php';

        $config->set('illuminate.filesystems', (array) $filesystems);

        return $config->set('illuminate.view', (array) $view);
    }
}
