<?php
/** @noinspection PhpUnused */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoonToRentalInvoicesAndPayments extends Migration
{
    public function up()
    {
        Schema::table('rental_invoices', function (Blueprint $table) {
            $table->integer('moon_id')->nullable()->after('refinery_id');
        });
        Schema::table('rental_invoices', function (Blueprint $table) {
            $table->bigInteger('refinery_id')->nullable()->change();
        });
        Schema::table('rental_payments', function (Blueprint $table) {
            $table->integer('moon_id')->nullable()->after('refinery_id');
        });
        Schema::table('rental_payments', function (Blueprint $table) {
            $table->bigInteger('refinery_id')->nullable()->change();
        });
    }

    public function down()
    {
        // note: do not undo "nullable"

        Schema::table('rental_invoices', function (Blueprint $table) {
            $table->dropColumn('moon_id');
        });
        Schema::table('rental_payments', function (Blueprint $table) {
            $table->dropColumn('moon_id');
        });
    }
}
