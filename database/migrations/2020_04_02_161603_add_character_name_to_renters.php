<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCharacterNameToRenters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renters', function (Blueprint $table) {
            $table->string('character_name', 255)->nullable()->after('character_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('renters', function (Blueprint $table) {
            $table->dropColumn('character_name');
        });
    }
}
