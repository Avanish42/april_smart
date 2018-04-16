<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRetailerToCheckRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cheque_register_models', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->change();
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')->references('id')->on('bills')->onUpdate('cascade')->onDelete('cascade')->change();
            $table->string('retailer_name');
            $table->string('allocationNo');
            $table->string('cheque_number')->nullable()->change();
            $table->string('cheque_amount')->nullable()->change();
            $table->string('bank_name')->nullable()->change();
            $table->string('remark')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cheque_register_models', function (Blueprint $table) {
            $table->dropForeign(['cheque_register_models_user_id_foreign,cheque_register_models_bill_id_foreign']);
            $table->dropColumn('user_id');
            $table->dropColumn('bill_id');
            $table->dropColumn('retailer_name');
            $table->dropColumn('allocationNo');
            $table->string('cheque_number')->change();
            $table->string('cheque_amount')->change();
            $table->string('bank_name')->change();
            $table->string('remark')->change();
        });
    }
}
