<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('allocationNo');
            $table->string('billNo');
            $table->string('retailerName');
            $table->float('billAmount');
            $table->float('saleReturn')->nullable();
            $table->float('pastCollection')->nullable();
            $table->integer('status_id')->nullable();
            $table->float('todayCollection')->nullable();
            $table->string('delivaryStatus')->nullable();
            $table->string('salesMan')->nullable();
            $table->string('retailerHierarchy');
            $table->string('retailerCode');
            $table->string('grossAmount');
            $table->string('schemeDiscount');
            $table->string('replacement');
            $table->string('distributerDiscount');
            $table->string('cashDiscount');
            $table->string('windowDisplay');
            $table->string('taxAmount');
            $table->string('debitAdjust');
            $table->string('taxAdjust');
            $table->string('netAmount');
            $table->unique(['allocationNo', 'billNo']);
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
        Schema::dropIfExists('bills');
    }
}
