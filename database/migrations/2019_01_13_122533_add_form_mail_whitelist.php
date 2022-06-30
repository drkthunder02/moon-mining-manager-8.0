<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFormMailWhitelist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('whitelist', function (Blueprint $table) {
            $table->boolean('form_mail')->default(0)->after('is_admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('whitelist', function (Blueprint $table) {
            $table->dropColumn('form_mail');
        });
    }
}
