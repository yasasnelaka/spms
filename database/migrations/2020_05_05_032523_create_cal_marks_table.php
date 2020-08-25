<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cal_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_admission_number');
            $table->foreign('student_admission_number')->references('admission_number')->on('students');
            $table->year('year');
            $table->integer('avg');
            $table->integer('rank')->nullable();
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
        Schema::dropIfExists('cal_marks');
    }
}
