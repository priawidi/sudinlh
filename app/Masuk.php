<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    protected $table = 'suratmasuk';

    protected $fillable = [
        'tgl_diterima',
        'nomor_agenda',
        'kode_klasifikasi',
        'pokok_surat',
        'tanggal_nomor_surat',
        'asal_surat',
        'ditujukan',
        'keterangan',
        //'dokumen'
    ];

    public static function totalMasuk() {
        return Masuk::count();
    }
}
