<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToBounceChequeRegisterModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bounce_cheque_register_models', function (Blueprint $table) {
          $table->integer('register_cheque_id')->unsigned();
          $table->foreign('register_cheque_id')->references('id')->on('cheque_register_models')->onUpdate('cascade')->onDelete('cascade');
          $table->string('Cheque_Date');
          $table->string('retailer_name');
          $table->string('cheque_number');
          $table->string('bank_name');
          $table->string('amount');
          $table->string('billno');
          $table->string('allocationNo')->nullable();
          $table->string('remark')->nullable();
          $table->boolean('is_cleared_now');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bounce_cheque_register_models', function (Blueprint $table) {
            $table->dropForeign(['bounce_cheque_register_models_register_cheque_id_foreign']);
            $table->dropColumn('register_cheque_id');
            $table->dropColumn('Cheque_Date');
            $table->dropColumn('retailer_name');
            $table->dropColumn('cheque_number');
            $table->dropColumn('bank_name');
            $table->dropColumn('amount');
            $table->dropColumn('billno');
            $table->dropColumn('allocationNo')->nullable();
            $table->dropColumn('remark')->nullable();
            $table->dropColumn('is_cleared_now');
        });
    }
}
