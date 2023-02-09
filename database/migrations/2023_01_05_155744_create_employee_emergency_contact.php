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
        Schema::create('employee_emergency_contact', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('primary_name');
            $table->string('primary_relationship');
            $table->string('primary_phone');
            $table->string('secondary_name');
            $table->string('secondary_relationship');
            $table->string('secondary_phone');
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
        Schema::dropIfExists('employee_emergency_contact');
    }
};
