<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id('nik');
            $tabel->string('bulan');
            
            $table->double('tunjangan');
            $table->double('uang_lembur');
            $table->double('pendapatan');

            $table->double('dana_pensiun');
            $table->double('pajak');
            $table->double('kredit_toko');
            $table->double('pemotongan');
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
        Schema::dropIfExists('salaries');
    }
}
