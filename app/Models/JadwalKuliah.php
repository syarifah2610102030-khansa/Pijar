<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'pengajuan_mk_id', 'kelas', 'hari', 'jam_mulai',
    'jam_selesai', 'ruang', 'link_daring',
])]
class JadwalKuliah extends Model
{
    protected $table = 'jadwal_kuliah';

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanMk::class, 'pengajuan_mk_id');
    }
}