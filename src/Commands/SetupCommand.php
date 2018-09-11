<?php
namespace RentalManager\Main\Commands;


use Illuminate\Console\Command;

class SetupCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'rm:setup-main';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup models and migrations.';


    /**
     * Commands to call with their description.
     *
     * @var array
     */
    protected $calls = [
        'rm:setup-models-main' => 'Setup the models',
        'rm:seeder-main' => 'Setup the seeder'
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
