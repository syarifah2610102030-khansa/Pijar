<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['pengajuan_mk_id', 'versi', 'file_path', 'nama_file', 'keterangan', 'uploaded_by'])]
class RpsMini extends Model
{
    protected $table = 'rps_mini';

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanMk::class, 'pengajuan_mk_id');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}