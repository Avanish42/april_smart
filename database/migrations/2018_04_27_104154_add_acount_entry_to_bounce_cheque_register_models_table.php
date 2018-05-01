<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAcountEntryToBounceChequeRegisterModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bounce_cheque_register_models', function (Blueprint $table) {
            $table->boolean('entry_in_account')->default(0);
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
            $table->dropColumn('entry_in_account');
        });
    }
}
