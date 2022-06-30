<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAllianceOwned extends Migration
{
    public function up()
    {
        Schema::table('moons', function (Blueprint $table) {
            $table->renameColumn('alliance_owned', 'status_flag');
        });
    }

    public function down()
    {
        Schema::table('moons', function (Blueprint $table) {
            $table->renameColumn('status_flag', 'alliance_owned');
        });
    }
}
