<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    protected $table = 'suratkeluar';

    protected $fillable = [
        'nomor_agenda',
        'tgl_masuk',
        'untuk',
        'nomor_surat',
        'tgl_surat',
        'perihal_surat',
        'tujuan',
        'ket',
        'dokumen',
    ];
}
