<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_updates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_admission_number');
            $table->foreign('student_admission_number')->references('admission_number')->on('students');
            $table->year('year')->nullable();
            $table->string('class');
            $table->string('grade');
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
        Schema::dropIfExists('class_updates');
    }
}
