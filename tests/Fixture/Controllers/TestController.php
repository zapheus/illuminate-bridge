<?php

namespace Zapheus\Bridge\Illuminate\Fixture\Controllers;

/**
 * Test Controller
 *
 * @package Zapheus
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class TestController
{
    /**
     * @var \Zapheus\Fixture\Http\Controllers\FoodController $food
     */
    protected $food;

    /**
     * Initializes the controller instance.
     *
     * @param \Zapheus\Fixture\Http\Controllers\FoodController $food
     */
    public function __construct(FoodController $food)
    {
        $this->food = $food;
    }
}
