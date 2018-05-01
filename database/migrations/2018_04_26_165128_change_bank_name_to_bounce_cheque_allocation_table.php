<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBankNameToBounceChequeAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bounce_cheque_allocation', function (Blueprint $table) {
            $table->dropColumn('bank_name');
            $table->integer('bank_id')->unsigned()->nullable();
            $table->foreign('bank_id')->references('id')->on('banks')->onUpdate('set null')->onDelete('set null');
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
            $table->dropForeign(['cheque_register_models_bank_id_foreign']);
            $table->dropColumn('bank_id');
            $table->string('bank_name');
        });
    }
}
