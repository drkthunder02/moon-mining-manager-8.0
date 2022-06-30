<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCorporationIdToRefineries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('refineries', function (Blueprint $table) {
            $table->integer('corporation_id')->nullable()->after('observer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('refineries', function (Blueprint $table) {
            $table->dropColumn('corporation_id');
        });
    }
}
