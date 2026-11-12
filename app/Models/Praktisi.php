<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama', 'instansi', 'jabatan', 'keahlian', 'email', 'no_hp', 'aktif'])]
class Praktisi extends Model
{
    protected $table = 'praktisi';

    protected function casts(): array
    {
        return [
            'aktif' => 'boolean',
        ];
    }

    public function pengajuan()
    {
        return $this->belongsToMany(PengajuanMk::class, 'pengajuan_praktisi')
            ->withPivot('peran', 'diisi_oleh')
            ->withTimestamps();
    }

    public function evaluasi()
    {
        return $this->hasMany(EvaluasiPraktisi::class);
    }
}