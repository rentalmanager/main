<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class RentalManagerMainSetupTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Providers
        Schema::create('providers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });

        // Property types
        Schema::create('property_types', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
        });

        // Rental types
        Schema::create('rental_types', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
        });

        // Rental restrictions
        Schema::create('rental_restrictions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
        });

        // Lease durations
        Schema::create('lease_durations', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
        });


        // Locations
        Schema::create('locations', function(Blueprint $table) {
            $table->increments('id');
            $table->string('google_place_id')->index()->nullable();
            $table->string('searchable_name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('street_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city')->nullable();
            $table->string('state_code')->nullable();
            $table->string('county')->nullable();
            $table->string('borough')->nullable();
            $table->string('postal_code')->nullable();
            $table->decimal('lat', 10, 8)->index()->nullable();  // lat
            $table->decimal('lng', 11, 8)->index()->nullable(); // lng
            $table->timestamps();
        });


        // Properties
        Schema::create('properties', function(Blueprint $table) {
            $table->increments('id');
            $table->string('foreign_id')->index()->nullable();
            $table->unsignedInteger('provider_id')->index()->nullable();
            $table->unsignedInteger('property_type_id')->index()->nullable(); // property type
            $table->unsignedInteger('rental_type_id')->index()->nullable(); // rental type
            $table->unsignedInteger('rental_restriction_id')->index()->nullable(); // rental restriction
            $table->unsignedInteger('lease_duration_id')->index()->nullable(); // lease duration
            $table->unsignedInteger('location_id')->index()->nullable(); // property location
            $table->string('slug')->nullable()->unique();
            $table->boolean('is_community')->default(false);
            $table->string('name')->nullable();
            $table->text('lease_terms')->nullable();
            $table->text('description')->nullable();
            $table->text('tags')->nullable(); // for storing custom tags or keywords
            $table->decimal('min_price', 10, 2)->nullable()->index(); // field for storing aggregate price
            $table->decimal('min_baths', 4, 2)->nullable()->index(); // field for storing aggregate baths
            $table->integer('min_beds')->nullable()->index(); // field for storing aggregate beds
            $table->integer('min_sqft')->nullable()->index(); // field for storing aggregate sqft
            $table->boolean('featured')->default(false);

            // Status stuff
            $table->enum('status', [
                // Viewable by everyone
                'active',
                // Expired listing
                'expired',
                // System admin has blocked for uncertain reason (reason can be set in a field)
                'blocked'
            ])->nullable()->index();
            $table->string('status_reason')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->foreign('rental_type_id')->references('id')->on('rental_types')->onDelete('cascade');
            $table->foreign('rental_restriction_id')->references('id')->on('rental_restrictions')->onDelete('cascade');
            $table->foreign('lease_duration_id')->references('id')->on('lease_durations')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
        });


        // Units
        Schema::create('units', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('property_id')->index()->nullable();
            $table->string('foreign_id')->nullable();
            $table->enum('type', ['unit', 'floor_plan'])->nullable();
            $table->string('name')->nullable(); // a name
            $table->string('apt_unit_ste')->nullable(); // a separate field for the apartment, unit or whatever
            $table->integer('total_units')->nullable();
            $table->integer('available_units')->nullable();
            $table->integer('beds')->index()->nullable();
            $table->decimal('baths', 4, 1)->index()->nullable();
            $table->integer('sqft')->index()->index()->nullable();
            $table->decimal('security_deposit', 10, 2)->nullable();
            $table->decimal('price_min', 10, 2)->index()->nullable();
            $table->decimal('price_max', 10, 2)->index()->nullable();
            $table->decimal('pets_fee', 10, 2)->nullable();
            $table->boolean('pets')->default(false);
            $table->text('pets_info')->nullable();
            $table->text('tags')->nullable(); // for storing custom tags, amenities or keywords
            $table->timestamp('available_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });

        // Contacts
        Schema::create('contacts', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('property_id')->nullable()->index();
            $table->enum('owner', ['company', 'owner', 'tenant'])->nullable()->index();
            $table->enum('method', ['email', 'api', 'redirect'])->nullable();
            $table->string('url')->nullable();
            $table->string('email_to')->nullable();
            $table->string('email_cc')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });

    }

    /**
     * Down
     */
    public function down()
    {
        Schema::dropIfExists('providers');
        Schema::dropIfExists('property_types');
        Schema::dropIfExists('rental_types');
        Schema::dropIfExists('rental_restrictions');
        Schema::dropIfExists('lease_durations');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('properties');
        Schema::dropIfExists('units');
        Schema::dropIfExists('contacts');
    }
}

