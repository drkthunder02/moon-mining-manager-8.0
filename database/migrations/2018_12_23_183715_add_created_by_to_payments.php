<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedByToPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->integer('created_by')->nullable()->after('ref_id');
        });
        Schema::table('rental_payments', function (Blueprint $table) {
            $table->integer('created_by')->nullable()->after('ref_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
        Schema::table('rental_payments', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
}
