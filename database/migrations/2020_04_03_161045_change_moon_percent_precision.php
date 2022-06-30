<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMoonPercentPrecision extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('moons', function (Blueprint $table) {
            $table->decimal('mineral_1_percent', 6, 3)->change();
            $table->decimal('mineral_2_percent', 6, 3)->change();
            $table->decimal('mineral_3_percent', 6, 3)->change();
            $table->decimal('mineral_4_percent', 6, 3)->change();
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
            $table->decimal('mineral_1_percent', 4, 2)->change();
            $table->decimal('mineral_2_percent', 4, 2)->change();
            $table->decimal('mineral_3_percent', 4, 2)->change();
            $table->decimal('mineral_4_percent', 4, 2)->change();
        });
    }
}
