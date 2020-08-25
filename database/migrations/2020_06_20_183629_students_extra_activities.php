<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentsExtraActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_extra_activities', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->bigInteger('student_admission_number');
            $table->foreign('student_admission_number')->references('admission_number')->on('students');
            $table->bigInteger('extra_activities_id');
            $table->foreign('extra_activities_id')->references('id')->on('extra_activities');
            $table->date('date')->nullable();
            $table->string('class')->nullable();
            $table->string('rank')->nullable();
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
        //
    }
}
