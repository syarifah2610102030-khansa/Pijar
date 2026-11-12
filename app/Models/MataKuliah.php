<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['kode_mk', 'nama_mk', 'sks', 'prodi_id'])]
class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function pengajuan()
    {
        return $this->hasMany(PengajuanMk::class);
    }
}