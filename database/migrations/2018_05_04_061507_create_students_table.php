<?php

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
            $table->string('nama_student');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('jk',['l','p']);
            $table->string('telp');
            $table->string('alamat');
            $table->integer('total_kursus_yg_diambil');
            $table->string('tgl_lahir');
            $table->string('lattitude_longitude');
            $table->string('tgl_daftar');
            $table->string('poin');
            $table->string('status_pekerjaan');
            $table->string('status_aktif');
            $table->string('foto');
            $table->double('balance');
            $table->rememberToken();
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
        Schema::drop('students');
    }
}
