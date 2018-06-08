<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBabusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('babus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('travel_id');
            $table->foreign('travel_id')->references('id')->on('travels')->onDelete('CASCADE');
            $table->unsignedInteger('kuliner_id');
            $table->foreign('kuliner_id')->references('id')->on('kuliners')->onDelete('CASCADE');
            $table->unsignedInteger('galleri_id');
            $table->foreign('galleri_id')->references('id')->on('galleris')->onDelete('CASCADE');
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
        Schema::dropIfExists('babus');
    }
}
