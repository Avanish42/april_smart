<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPenaltyIdToBounceChequeAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bounce_cheque_allocation', function (Blueprint $table) {
            $table->integer('penalty_id')->nullable()->unsigned();
            $table->foreign('penalty_id')->references('id')->on('cheque_penalty_models')->onDelete('set null')->onUpdate('set null');
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
            $table->dropForeign(['bounce_cheque_allocation_penalty_id_foreign']);
            $table->dropColumn('penalty_id');
        });
    }
}
