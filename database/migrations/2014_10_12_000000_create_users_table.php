<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('fatherName')->nullable();
            $table->string('mobileNo')->nullable();
            $table->string('password')->nullable();
            $table->string('localAddress')->nullable();
            $table->string('permanentAddress')->nullable();
            $table->string('idProofName')->nullable();
            $table->string('idProofNo')->nullable();
            $table->string('idProofImage')->nullable();
            $table->string('addressProofName')->nullable();
            $table->string('addressProofNo')->nullable();
            $table->string('addressProofImage')->nullable();
            $table->string('dateOfJoining')->nullable();
            $table->float('salary')->nullable();
            $table->string('otherPerk')->nullable();
            $table->string('policeVerification')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
