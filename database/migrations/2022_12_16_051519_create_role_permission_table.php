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
        Schema::create('role_permission', function (Blueprint $table) {
            $table->id();
            $table->string('permission_name')->nullable();
            $table->timestamps();
        });
        DB::table('role_permission')->insert(
        [
            ['permission_name' => 'Admin'],
            ['permission_name' => 'Manager'],
            ['permission_name' => 'Employee Trainer'],
            ['permission_name' => 'Accountant'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permission');
    }
};
