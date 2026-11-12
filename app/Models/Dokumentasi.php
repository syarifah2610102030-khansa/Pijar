<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'pengajuan_mk_id', 'jenis', 'judul', 'file_path',
    'url_eksternal', 'keterangan', 'uploaded_by',
])]
class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanMk::class, 'pengajuan_mk_id');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}