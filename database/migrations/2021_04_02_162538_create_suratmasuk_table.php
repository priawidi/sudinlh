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
            $table->id();
            $table->string('nomor_agenda');
            $table->date('tgl_masuk');
            $table->string('dari');
            $table->string('nomor_surat');
            $table->date('tgl_surat');
            $table->string('perihal_surat');
            $table->string('tujuan');
            $table->string('ket');
            $table->string('dokumen')->nullable;
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