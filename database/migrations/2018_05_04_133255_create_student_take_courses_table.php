<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTakeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // $table->foreign('user_id')->references('id')->on('users');
        Schema::create('student_take_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tutor')->unsigned();
            $table->integer('id_kursus')->unsigned();
            $table->timestamp('waktu_mulai')->nullable();
            $table->timestamp('waktu_selesai')->nullable();
            $table->enum('status',['belum','berlangsung','selesai']);
            $table->string('lattitude_longitude');
            $table->enum('tipe_bayar',['digital','tunai']);
            $table->double('total_bayar');
            $table->double('kembalian');
            $table->foreign('id_tutor')->references('id')->on('tutors');
            $table->foreign('id_kursus')->references('id')->on('courses');
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
        Schema::dropIfExists('student_take_courses');
    }
}
