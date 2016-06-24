<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksVolunteersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers_task_volunteer', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('volunteer_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->integer('priority')->default(3);

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
        Schema::drop('volunteers_task_volunteer');
    }

}
