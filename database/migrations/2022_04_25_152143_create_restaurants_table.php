<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->longText('description')->nullable();
            $table->timestamp('date_opened')->nullable();
            $table->json('service_options');
            $table->double('location_longitude')->nullable();
            $table->double('location_latitude')->nullable();
            $table->string('address_1', 256)->nullable();
            $table->string('address_2', 256)->nullable();
            $table->string('town', 256)->nullable();
            $table->string('city', 256)->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('restaurants');
    }
}
