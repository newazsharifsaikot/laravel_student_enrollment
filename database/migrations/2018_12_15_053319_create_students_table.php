<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_roll');
            $table->string('student_name');
            $table->string('student_fatherName');
            $table->string('student_motherName');
            $table->string('student_email');
            $table->string('student_password');
            $table->string('student_phone');
            $table->string('student_address');
            $table->string('student_image');
            $table->integer('student_department');
            $table->integer('student_admissionYear');
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
        Schema::dropIfExists('students');
    }
}
