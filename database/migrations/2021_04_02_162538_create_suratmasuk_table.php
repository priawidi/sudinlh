<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->id('nomor_urut');
            $table->date('tgl_diterima');
            $table->string('nomor_agenda');
            $table->string('kode_klasifikasi');
            $table->string('pokok_surat');
            $table->date('tanggal_nomor_surat');
            $table->string('asal_surat');
            $table->string('ditujukan');
            $table->string('keterangan');
            //$table->string('dokumen')->nullable;
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
        Schema::dropIfExists('suratmasuk');
    }
}
