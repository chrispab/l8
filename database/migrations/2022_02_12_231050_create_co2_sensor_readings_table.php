<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCo2SensorReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co2_sensor_readings', function (Blueprint $table) {
            $table->id();
            $table->string('co2',10);
            $table->string('temperature',10);
            $table->string('humidity',10);
            $table->timestamp('sample_time');
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
        Schema::dropIfExists('co2_sensor_readings');
    }
}
