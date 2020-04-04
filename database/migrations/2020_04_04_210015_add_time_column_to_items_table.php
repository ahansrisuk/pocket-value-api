<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeColumnToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->unsignedInteger('time_id')->after('location_id')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('time_id');
        });
    }
}
