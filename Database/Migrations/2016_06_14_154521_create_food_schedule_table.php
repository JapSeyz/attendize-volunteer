<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodScheduleTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers_food_times', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('day_id')->unsigned();
            $table->string('time');

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
        Schema::drop('volunteers_food_times');
    }
}
