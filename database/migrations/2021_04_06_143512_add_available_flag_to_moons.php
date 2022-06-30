<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailableFlagToMoons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('moons', function (Blueprint $table) {
            $table->boolean('available')->default(1)->after('alliance_owned');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moons', function (Blueprint $table) {
            $table->dropColumn('available');
        });
    }
}
