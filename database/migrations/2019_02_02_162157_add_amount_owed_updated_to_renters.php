<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAmountOwedUpdatedToRenters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renters', function (Blueprint $table) {
            $table->dateTime('generate_invoices_job_run')->nullable()->after('amount_owed');
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
            $table->dropColumn('generate_invoices_job_run');
        });
    }
}
