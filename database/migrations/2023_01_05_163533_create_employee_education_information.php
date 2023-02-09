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
        Schema::create('employee_education_information', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('institution_name');
            $table->string('degree');
            $table->string('roll_number');
            $table->string('campus');
            $table->string('grade');
            $table->string('start_date');
            $table->string('end_date');
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
        Schema::dropIfExists('employee_education_information');
    }
};
