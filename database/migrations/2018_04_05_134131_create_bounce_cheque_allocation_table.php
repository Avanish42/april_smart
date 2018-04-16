<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBounceChequeAllocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounce_cheque_allocation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('allocationNo')->nullable();
            $table->integer('bounce_cheque_register_id')->unsigned();
            $table->foreign('bounce_cheque_register_id')->references('id')->on('bounce_cheque_register_models')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Cheque_Date');
            $table->string('retailer_name');
            $table->string('cheque_number');
            $table->string('bank_name');
            $table->string('amount');
            $table->string('billno');
            $table->string('bill_allocation_no');
            $table->unique(['allocationNo', 'cheque_number']);
            $table->tinyInteger('isPast')->default(0);
            $table->tinyInteger('isAllocated')->default(0);
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
        Schema::dropIfExists('bounce_cheque_allocation');
    }
}
