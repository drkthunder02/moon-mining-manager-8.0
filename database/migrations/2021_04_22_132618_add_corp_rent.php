<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCorpRent extends Migration
{
    public function up()
    {
        Schema::table('moons', function (Blueprint $table) {
            $table->decimal('monthly_corp_rental_fee', 17, 2)->after('monthly_rental_fee');
            $table->decimal('previous_monthly_corp_rental_fee', 17, 2)->after('previous_monthly_rental_fee');
        });
    }

    public function down()
    {
        Schema::table('moons', function (Blueprint $table) {
            $table->dropColumn('previous_corp_monthly_rental_fee');
            $table->dropColumn('monthly_corp_rental_fee');
        });
    }
}
