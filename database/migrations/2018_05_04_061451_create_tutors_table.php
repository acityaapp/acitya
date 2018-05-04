<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tutor');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nik');
            $table->string('foto');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('alamat');
            $table->string('rt_rw');
            $table->string('lattitude_longitude');
            $table->string('tgl_lahir');
            $table->string('telp');
            $table->boolean('status_aktif');
            $table->double('balance');
            $table->string('lampiran');
            $table->string('tgl_daftar');
            $table->enum('jk',['l','p']);
            $table->string('tempat_lahir');
            $table->integer('rating');
            $table->string('pekerjaan');
            $table->string('status_perkawinan');            
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
        Schema::drop('tutors');
    }
}
