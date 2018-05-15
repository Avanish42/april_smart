<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollectionToTempbillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tempbill', function (Blueprint $table) {
            $table->double('saleReturn', 8, 2)->nullable();
            $table->double('pastCollection', 8, 2)->nullable();
            $table->double('todayCollection', 8, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tempbill', function (Blueprint $table) {
            $table->dropColumn('saleReturn');
            $table->dropColumn('pastCollection');
            $table->dropColumn('todayCollection');
        });
    }
}
