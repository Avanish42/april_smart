<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollectionToBounceChequeAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bounce_cheque_allocation', function (Blueprint $table) {
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
        Schema::table('bounce_cheque_allocation', function (Blueprint $table) {
            $table->dropColumn('pastCollection');
            $table->dropColumn('todayCollection');
        });
    }
}
