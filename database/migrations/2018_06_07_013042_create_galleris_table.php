<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGallerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photos');
            $table->unsignedInteger('travel_id');
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('CASCADE');
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
        Schema::dropIfExists('galleris');
    }
}
