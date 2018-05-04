<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // $table->foreign('user_id')->references('id')->on('users');
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kursus');
            $table->string('deskripsi');
            $table->integer('rating');
            $table->string('foto');
            $table->double('harga');
            $table->integer('diskon');
            $table->integer('jml_student_max');
            $table->integer('jml_student_now');
            $table->string('tipe_kursus');
            $table->boolean('status_aktif');
            $table->integer('id_tutor')->unsigned();
            $table->foreign('id_tutor')->references('id')->on('tutors');
            $table->integer('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('categories');
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
        Schema::dropIfExists('courses');
    }
}
