<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVolunteersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->index();
            $table->string('password');
            $table->string('email')->index();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();

            $table->date('birthday')->nullable();
            $table->string('clothing_size')->nullable();

            $table->string('address')->nullable();
            $table->integer('zip')->nullable();

            $table->boolean('newsletter')->default(0);
            $table->boolean('extra_events')->default(0);
            $table->text('previous_tasks')->nullable();
            $table->text('additional_information')->nullable();

            // Properties
            $table->integer('level')->default(1);

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
        Schema::drop('volunteers');
    }

}
