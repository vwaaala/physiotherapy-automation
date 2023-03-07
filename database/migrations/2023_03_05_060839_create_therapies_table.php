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
        Schema::create('therapies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id')->unsigned();
            $table->unsignedBigInteger('assistant_id')->unsigned();
            $table->unsignedBigInteger('created_by')->unsigned();
            $table->string('notes')->nullable();
            $table->foreign('package_id')->references('id')->on('therapy_packages');
            $table->foreign('assistant_id')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('therapies');
    }
};
