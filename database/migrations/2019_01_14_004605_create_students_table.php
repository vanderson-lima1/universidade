<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            // numero de aulas
            $table->smallInteger('nrLessons')->unsigned()->nullable($value=false);
            //$table->enum('period', ['MORNING', 'AFTERNOON', 'DAYTIME']);
            $table->smallInteger('period');
            
            $table->integer('unity_id')->unsigned()->nullable($value=false);
            $table->foreign('unity_id')->references('id')->on('unities');

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
        Schema::dropIfExists('students');
    }
}
