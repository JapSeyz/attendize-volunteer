<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodScheduleVolunteerTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_schedule_volunteer', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('food_schedule_id')->unsigned();
            $table->integer('volunteer_id')->unsigned();

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
        Schema::drop('food_schedule_volunteer');
    }

}
