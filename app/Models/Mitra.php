<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'nama_mitra', 'jenis', 'nama_pic', 'email', 'no_hp',
    'no_pks', 'tgl_mulai', 'tgl_berakhir',
])]
class Mitra extends Model
{
    protected $table = 'mitra';

    protected function casts(): array
    {
        return [
            'tgl_mulai' => 'date',
            'tgl_berakhir' => 'date',
        ];
    }

    public function pengajuan()
    {
        return $this->belongsToMany(PengajuanMk::class, 'pengajuan_mitra')
            ->withPivot('peran_mitra', 'diisi_oleh')
            ->withTimestamps();
    }
}