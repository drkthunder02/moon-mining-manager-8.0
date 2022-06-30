<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUserToken extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('token')->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('token', 255)->change();
        });
    }
}
