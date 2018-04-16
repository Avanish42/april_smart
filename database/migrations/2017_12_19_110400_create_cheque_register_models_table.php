<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChequeRegisterModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque_register_models', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Cheque_Date');
            $table->string('cheque_number');
            $table->string('cheque_amount');
            $table->string('bank_name');
            $table->string('billno');
            $table->string('remark');

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
        Schema::dropIfExists('cheque_register_models');
    }
}
