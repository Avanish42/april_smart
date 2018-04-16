<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsClearedToChequeRegisterModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cheque_register_models', function (Blueprint $table) {
            $table->boolean('is_cleared')->default(0);
            $table->boolean('is_bounce')->default(0);
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
            $table->dropColumn('is_cleared');
            $table->dropColumn('is_bounce');
        });
    }
}
