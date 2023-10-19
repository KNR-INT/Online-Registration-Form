<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onlinereg', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('gender');
        $table->string('dob');
        $table->string('class');
        $table->string('birth_place');
        $table->string('nationality');
        $table->string('religion');
        $table->string('mother_tongue');
        $table->string('phy_clg');
        $table->string('slp_need');
        $table->string('aadhar');
        $table->string('transport');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
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
        Schema::dropIfExists('onlinereg');
        
    }
};
