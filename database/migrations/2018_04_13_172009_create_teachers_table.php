<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teacher_Fname');
            $table->string('teacher_Lname');
            $table->string('teacher_Email');
            $table->integer('Reg_Num');
            $table->integer('SSN');
            $table->string('StaffID');
            $table->string('DOFA')->timestamps();
            $table->string('DOB');
            $table->string('teacher_Current_Rank');
            $table->string('teacher_Gender');
            $table->timestamps();
            $table->string('SchoolName');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
