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
        Schema::create('employee_position_name', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        DB::table('employee_position_name')->insert([
            ['name' => 'Manager'],
            ['name' => 'Accountant'],
            ['name' => 'Employee Trainer'],
            ['name' => 'Physio Doctor'],
            ['name' => 'Assistant Physio'],
            ['name' => 'Branding'],
            ['name' => 'Promoter'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_position_name');
    }
};
