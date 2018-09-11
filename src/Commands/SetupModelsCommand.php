<?php
namespace RentalManager\Main\Commands;


use Illuminate\Console\Command;

/**
 * Class SetupModelsCommand
 * @package Propeller\Commands
 */
class SetupModelsCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'rm:setup-models-main';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup models for the main package';


    /**
     * Commands to call with their description.
     *
     * @var array
     */
    protected $calls = [
        'rm:model-contact' => 'Creating the Contact model',
        'rm:model-lease-duration' => 'Creating the LeaseDuration model',
        'rm:model-location' => 'Creating the Location model',
        'rm:model-property' => 'Creating the Property model',
        'rm:model-property-type' => 'Creating the PropertyType model',
        'rm:model-provider' => 'Creating the Provider model',
        'rm:model-rental-restriction' => 'Creating the RentalRestriction model',
        'rm:model-rental-type' => 'Creating the RentalType model',
        'rm:model-unit' => 'Creating the Unit model',
    ];

    /**
     * Create a new command instance
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->calls as $command => $info) {
            $this->line(PHP_EOL . $info);
            $this->call($command);
        }
    }
}
