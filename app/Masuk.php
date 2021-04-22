<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    protected $table = 'suratmasuk';

    protected $fillable = [
        'nomor_agenda',
        'tgl_masuk',
        'dari',
        'nomor_surat',
        'tgl_surat',
        'perihal_surat',
        'tujuan',
        'ket',
        'dokumen'
    ];
}
