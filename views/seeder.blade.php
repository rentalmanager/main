<?php echo '<?php' ?>

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalManagerMainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Truncating tables');
        $this->truncateTables();

        // PropertyIdentification data
        $providerData = config('rentalmanager.seeder.providers');

        foreach ($providerData as $key => $data) {
            $do = \App\RentalManager\Main\Provider::create($data);
        }

        // PropertyIdentification data
        $propertyTypeData = config('rentalmanager.seeder.property_type');

        foreach ($propertyTypeData as $key => $data) {
            // Create a new type
            $do = \App\RentalManager\Main\PropertyType::create($data);
        }

        // RentalType data
        $rentalTypeData = config('rentalmanager.seeder.rental_type');

        foreach ($rentalTypeData as $key => $data) {
            // Create a new type
            $do = \App\RentalManager\Main\RentalType::create($data);
        }

        // RentalRestriction data
        $rentalRestrictionData = config('rentalmanager.seeder.rental_restriction');

        foreach ($rentalRestrictionData as $key => $data) {
            // Create a new type
            $do =  \App\RentalManager\Main\RentalRestriction::create($data);
        }


        // Lease duration data
        $lease_durations = config('rentalmanager.seeder.lease_duration');

        foreach ($lease_durations as $key => $data) {
            // create a new lease duration
            $do =  \App\RentalManager\Main\LeaseDuration::create($data);
        }

    }

    /**
     * Truncates all the propeller tables
     *
     * @return  void
     */
    public function truncateTables()
    {
        Schema::disableForeignKeyConstraints();
        \App\RentalManager\Main\Provider::truncate();
        \App\RentalManager\Main\PropertyType::truncate();
        \App\RentalManager\Main\LeaseDuration::truncate();
        \App\RentalManager\Main\RentalType::truncate();
        \App\RentalManager\Main\RentalRestriction::truncate();
        Schema::enableForeignKeyConstraints();
    }

}
