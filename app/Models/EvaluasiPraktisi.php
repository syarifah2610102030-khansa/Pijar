<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'pengajuan_mk_id', 'praktisi_id', 'dosen_id',
    'skor', 'catatan', 'link_gform', 'tgl_evaluasi',
])]
class EvaluasiPraktisi extends Model
{
    protected $table = 'evaluasi_praktisi';

    protected function casts(): array
    {
        return [
            'skor' => 'decimal:2',
            'tgl_evaluasi' => 'date',
        ];
    }

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanMk::class, 'pengajuan_mk_id');
    }

    public function praktisi()
    {
        return $this->belongsTo(Praktisi::class);
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }
}