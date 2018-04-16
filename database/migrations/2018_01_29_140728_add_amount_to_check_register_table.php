<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAmountToCheckRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cheque_register_models', function (Blueprint $table) {
            $table->string('Cheque_Date')->nullable()->change();
            $table->string('amount');
            $table->boolean('is_completed')->default(0);
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
            $table->date('Cheque_Date')->change();
            $table->dropColumn('amount');
            $table->dropColumn('is_completed');
        });
    }
}
