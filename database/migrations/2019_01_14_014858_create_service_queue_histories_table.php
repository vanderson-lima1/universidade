<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceQueueHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_queue_histories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('servicequeue_id')->unsigned();
            $table->foreign('servicequeue_id')->references('id')->on('service_queues');

            $table->bigInteger('protocol_id')->unsigned();
            $table->foreign('protocol_id')->references('id')->on('protocols');

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
        Schema::dropIfExists('service_queue_histories');
    }
}
