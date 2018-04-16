<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('salesMan');
            $table->string('retailerHierarchy');
            $table->string('retailerCode');
            $table->string('retailerName');
            $table->string('Address');
            $table->string('salesInvoiceNumber');
            $table->string('salesInvoiceDate');
            $table->string('actualDeliveryDate');
            $table->string('deliveryStatus');
            $table->string('brandCaption');
            $table->string('distProductCode');
            $table->string('motherPackName');
            $table->string('productName');
            $table->string('Batch');
            $table->string('MRP');
            $table->string('sellingRate');
            $table->string('quantityBilled');
            $table->string('grossAmount');
            $table->string('netAmount');
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
        Schema::dropIfExists('billproducts');
    }
}
