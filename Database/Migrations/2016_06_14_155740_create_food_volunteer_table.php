<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodVolunteerTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers_food_volunteer', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('food_id')->unsigned()->index();
            $table->foreign('food_id')->references('id')->on('food_times')->onDelete('cascade');
            $table->integer('volunteer_id')->unsigned()->index();
            $table->foreign('volunteer_id')->references('id')->on('volunteers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('volunteers_food_volunteer');
    }

}
