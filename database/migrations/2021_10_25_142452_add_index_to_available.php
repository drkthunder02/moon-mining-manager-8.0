<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToAvailable extends Migration
{
    public function up()
    {
        Schema::table('moons', function (Blueprint $table) {
            $table->index('available');
        });
    }

    public function down()
    {

    }
}
