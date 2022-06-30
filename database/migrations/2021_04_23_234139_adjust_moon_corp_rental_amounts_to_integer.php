<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdjustMoonCorpRentalAmountsToInteger extends Migration
{
    public function up()
    {
        Schema::table('moons', function (Blueprint $table) {
            $table->decimal('monthly_corp_rental_fee', 15, 0)->change();
            $table->decimal('previous_monthly_corp_rental_fee', 15, 0)->change();
        });
    }

    public function down()
    {
        Schema::table('moons', function (Blueprint $table) {
            $table->decimal('monthly_corp_rental_fee', 17, 2)->change();
            $table->decimal('previous_monthly_corp_rental_fee', 17, 2)->change();
        });
    }
}
