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
        Schema::create('therapy_packages', function (Blueprint $table) {
            $table->id();
            $table->string('patient_phonenumber');
            $table->unsignedBigInteger('prescription_id')->unsigned();
            $table->string('price');
            $table->string('daily_times');
            $table->string('num_days');
            $table->string('follow_up');
            $table->boolean('notify_followup')->nullable()->default(false);
            $table->integer('discount'); // percentage
            $table->string('note');
            $table->boolean('status')->nullable()->default(false);
            $table->unsignedBigInteger('creator_id')->unsigned();
            $table->foreign('prescription_id')->references('id')->on('prescriptions');
            $table->foreign('creator_id')->references('id')->on('users');
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
        Schema::dropIfExists('therapy_packages');
    }
};
