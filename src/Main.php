<?php
namespace RentalManager\Main;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 7:57 AM
 */

/**
 * Class Main
 * @package RentalManager\Main
 */
class Main {

    /**
     * Laravel application.
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;


    /**
     * Base constructor.
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }
}
