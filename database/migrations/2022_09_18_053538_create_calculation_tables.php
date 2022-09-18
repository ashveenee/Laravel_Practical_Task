<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculation', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('name');
            $table->boolean('is_admin')->default('0'); 
            $table->string('principal')->nullable(); 
            $table->string('rate')->nullable(); 
            $table->string('time')->nullable(); 
            $table->string('interest')->nullable(); 
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
        Schema::dropIfExists('calculation');
    }
}
