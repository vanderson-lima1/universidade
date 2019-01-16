<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_queues', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('protocol_id')->unsigned();
            $table->foreign('protocol_id')->references('id')->on('protocols');

            $table->dateTime('schedulingDate');
            //$table->enum('schedulingStatus', ['AGENDADO', 'CANCELADO', 'ATENDIDO']);
            $table->smallInteger('status'); 

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
        Schema::dropIfExists('service_queues');
    }
}
