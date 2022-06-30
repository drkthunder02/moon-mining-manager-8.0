<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExtractions extends Migration
{
    public function up()
    {
        Schema::create('extractions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('moon_id');
            $table->bigInteger('refinery_id');
            $table->dateTime('notification_timestamp');
            $table->integer('ore1_type_id')->nullable();
            $table->integer('ore1_volume')->nullable();
            $table->integer('ore2_type_id')->nullable();
            $table->integer('ore2_volume')->nullable();
            $table->integer('ore3_type_id')->nullable();
            $table->integer('ore3_volume')->nullable();
            $table->integer('ore4_type_id')->nullable();
            $table->integer('ore4_volume')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('extractions');
    }
}
