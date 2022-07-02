<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('nik');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('email');
            $table->string('agama');
            $table->string('marital');
            $table->string('ijazah_terakhir');
            $table->string('status_kepegawaian');
            $table->string('jabatan');
            $table->string('tempat_bekerja');
            $table->date('tgl_masuk_kerja');
            $table->date('tgl_pengangkatan');
            $table->string('golongan_terakhir');
            $table->integer('lama_bekerja');
            $table->integer('usia_pensiun');
            $table->integer('usia_sekarang');
            $table->integer('perkiraan_pensiun');
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
        Schema::dropIfExists('employees');
    }
}
