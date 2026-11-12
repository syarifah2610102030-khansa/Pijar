<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['kode', 'nama', 'fakultas'])]
class Prodi extends Model
{
    protected $table = 'prodi';

    public function mataKuliah()
    {
        return $this->hasMany(MataKuliah::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pengajuan()
    {
        return $this->hasMany(PengajuanMk::class);
    }
}