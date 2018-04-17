<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempBillRetailerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_bill_retailer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('retailer_name');
            $table->string('beat');
            $table->integer('salesman_id')->unsigned()->nullable();
            $table->foreign('salesman_id')->references('id')->on('users')->onUpdate('set null')->onDelete('set null');
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
        Schema::dropIfExists('temp_bill_retailer');
    }
}
