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
        Schema::create('employee_personal_information', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('passport_no')->null();
            $table->string('passport_expdate')->null();
            $table->string('national_id')->null();
            $table->string('nationality')->null();
            $table->string('religion')->null();
            $table->string('maritual_status')->null();
            $table->string('spouse_employment')->null();
            $table->string('no_of_children')->null();
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
        Schema::dropIfExists('employee_personal_information');
    }
};
