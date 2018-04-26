<?php

namespace Staticka\Renderers;

use Illuminate\Contracts\View\Factory;
use Zapheus\Renderer\RendererInterface;

/**
 * Illuminate View (Blade) Renderer
 *
 * @package Staticka
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class BladeRenderer implements RendererInterface
{
    /**
     * @var \Illuminate\Contracts\View\Factory
     */
    protected $factory;

    /**
     * Initializes the renderer instance.
     *
     * @param \Illuminate\Contracts\View\Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Renders a template.
     *
     * @param  string $template
     * @param  array  $data
     * @return string
     */
    public function render($template, array $data = array())
    {
        return $this->factory->make($template, $data)->render();
    }
}
