<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempbillSaleReturnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempbill_sale_return_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tempbill_id')->unsigned();
            $table->foreign('tempbill_id')->references('id')->on('tempbill')->onUpdate('cascade')->onDelete('cascade');
            $table->string('item_name');
            $table->string('pcsboxincase');
            $table->string('item_mrp');
            $table->string('item_quantity');
            $table->string('item_units');
            $table->string('item_rate');
            $table->string('item_per');
            $table->string('item_rate_per_piece');
            $table->string('item_amount');
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
        Schema::dropIfExists('tempbill_sale_return_products');
    }
}
