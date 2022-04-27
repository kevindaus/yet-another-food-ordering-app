<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVirtualFullnameFieldCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('fullname')->virtualAs("concat(first_name,' ',last_name)");
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {

        });
    }
}
