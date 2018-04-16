<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClearedChequeRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleared_cheque_register', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('register_cheque_id')->unsigned();
            $table->foreign('register_cheque_id')->references('id')->on('cheque_register_models')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Cheque_Date');
            $table->string('retailer_name');
            $table->string('cheque_number');
            $table->string('bank_name');
            $table->string('amount');
            $table->string('billno');
            $table->string('allocationNo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cleared_cheque_register');
    }
}
