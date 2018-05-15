<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddPurchaseProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_purchase_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('add_purchase_id')->unsigned();
            $table->foreign('add_purchase_id')->references('id')->on('add_purchase')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('add_purchase_products');
    }
}
