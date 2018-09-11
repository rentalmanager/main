<?php
namespace RentalManager\Main\Commands;



use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class SeederCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'rm:seeder-main';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates the seeder following the specifications.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->laravel->view->addNamespace('rentalmanager', __DIR__.'/../../views');
        if (file_exists($this->seederPath())) {
            $this->line('');
            $this->warn("The Seeder file already exists. Delete the existing one if you want to create a new one.");
            $this->line('');
            return;
        }
        if ($this->createSeeder()) {
            $this->info("Seeder successfully created!");
        } else {
            $this->error(
                "Couldn't create seeder.\n".
                "Check the write permissions within the database/seeds directory."
            );
        }
        $this->line('');
    }


    /**
     * Create the seeder
     *
     * @return bool
     */
    protected function createSeeder()
    {
        $output = $this->laravel->view->make('rentalmanager::seeder')->render();

        if ($fs = fopen($this->seederPath(), 'x')) {
            fwrite($fs, $output);
            fclose($fs);
            return true;
        }
        return false;
    }

    /**
     * Get the seeder path.
     *
     * @return string
     */
    protected function seederPath()
    {
        return database_path("seeds/RentalManagerMainSeeder.php");
    }
}
