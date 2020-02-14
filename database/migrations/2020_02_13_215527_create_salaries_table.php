<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id', 10);
            $table->string('gross', 100);
            $table->string('bonus', 100);
            $table->string('allowance', 100);
            $table->string('total_benefits', 100);
            $table->string('nhif', 100);
            $table->string('nssf', 100);
            $table->string('kra', 100);
            $table->string('total_deductions', 100);
            $table->string('net', 100);
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
        Schema::dropIfExists('salaries');
    }
}
