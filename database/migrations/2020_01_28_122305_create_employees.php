<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empNames', 100);
            $table->string('email', 100);
            $table->string('empNo', 100);
            $table->string('nssf', 100);
            $table->string('nhif', 100);
            $table->string('kra', 100);
            $table->string('department', 100);
            $table->string('position', 100);
            $table->string('grosspay', 100);
            $table->string('password', 100);
            $table->string('gender', 100);
            $table->date('birthdate');
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
        Schema::dropIfExists('employees');
    }
}
