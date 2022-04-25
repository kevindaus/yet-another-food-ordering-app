<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 256)->nullable();
            $table->string('last_name', 256)->nullable();
            $table->string('mobile_number', 256)->nullable();
            $table->string('address_1', 256)->nullable();
            $table->string('address_2', 256)->nullable();
            $table->string('postcode', 256)->nullable();
            $table->string('town', 256)->nullable();
            $table->string('province', 256)->nullable();
            $table->double('address_location_longitude')->nullable();
            $table->double('address_location_latitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
