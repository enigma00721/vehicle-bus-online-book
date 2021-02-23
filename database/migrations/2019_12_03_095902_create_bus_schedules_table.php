<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bus_id');
            $table->integer('operator_id');
            $table->string('from',100);
            $table->string('destination',100);
            $table->dateTime('depart_date_time');
            $table->dateTime('return_date_time');
            $table->string('pickup_address');
            $table->string('dropoff_address');
            $table->integer('price');
            $table->boolean('status')->default(0); // active
            $table->timestamps();
        });
    }

    // we will add more field if require later okay.
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_schedules');
    }
}
