<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIsClearedToBounceChequeRegisterModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bounce_cheque_register_models', function (Blueprint $table) {
           $table->boolean('is_cleared_now')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bounce_cheque_register_models', function (Blueprint $table) {
            $table->boolean('is_cleared_now')->change();
        });
    }
}
