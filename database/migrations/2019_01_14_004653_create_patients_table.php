<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('unity_id')->unsigned()->nullable($value=true);
            $table->foreign('unity_id')->references('id')->on('unities');

            $table->string('name', 100)->nullable();
            $table->char('sex',1);
            //$table->enum('period', ['MORNING', 'AFTERNOON', 'DAYTIME']);
            $table->smallInteger('period')->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('documentCPF', 15)->nullable();
            $table->string('documentRG', 10)->nullable();
            $table->string('documentSUS', 16)->nullable();      
            
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');            
            
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
        Schema::dropIfExists('patients');
    }
}
