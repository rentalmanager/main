<?php
namespace RentalManager\Main\Commands\Generators;

use Illuminate\Console\GeneratorCommand;

/**
 * Created by PhpStorm.
 * User: gorankrgovic
 * Date: 9/10/18
 * Time: 11:34 AM
 */

class MakeUnitCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'rm:model-unit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Model if it does not exist';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Unit model';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__. '/../../../stubs/unit.stub';
    }


    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return 'App\RentalManager\Main\Unit';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }
}