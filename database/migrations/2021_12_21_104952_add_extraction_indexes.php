<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtractionIndexes extends Migration
{
    public function up()
    {
        Schema::table('extractions', function (Blueprint $table) {
            $table->index('moon_id');
            $table->index('refinery_id');
            $table->index('notification_timestamp');
            $table->index('ore1_type_id');
            $table->index('ore2_type_id');
            $table->index('ore3_type_id');
            $table->index('ore4_type_id');
        });

        Schema::table('mining_activities', function (Blueprint $table) {
            $table->index('refinery_id');
            $table->index('type_id');
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::table('extractions', function (Blueprint $table) {
            $table->dropIndex('extractions_moon_id_index');
            $table->dropIndex('extractions_refinery_id_index');
            $table->dropIndex('extractions_notification_timestamp_index');
            $table->dropIndex('extractions_ore1_type_id_index');
            $table->dropIndex('extractions_ore2_type_id_index');
            $table->dropIndex('extractions_ore3_type_id_index');
            $table->dropIndex('extractions_ore4_type_id_index');
        });

        Schema::table('mining_activities', function (Blueprint $table) {
            $table->dropIndex('mining_activities_refinery_id_index');
            $table->dropIndex('mining_activities_type_id_index');
            $table->dropIndex('mining_activities_created_at_index');
        });
    }
}
