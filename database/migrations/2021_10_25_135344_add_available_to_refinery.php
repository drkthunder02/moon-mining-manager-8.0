<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailableToRefinery extends Migration
{
    public function up()
    {
        Schema::table('refineries', function (Blueprint $table) {
            $table->boolean('available')->index()->default(1)->after('income');
        });
    }

    public function down()
    {
        Schema::table('refineries', function (Blueprint $table) {
            $table->dropColumn('available');
        });
    }
}
