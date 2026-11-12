<?php

namespace App\Models;

use App\Enums\KeputusanApproval;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['pengajuan_mk_id', 'admin_id', 'keputusan', 'catatan'])]
class ApprovalLog extends Model
{
    protected $table = 'approval_log';

    protected function casts(): array
    {
        return [
            'keputusan' => KeputusanApproval::class,
        ];
    }

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanMk::class, 'pengajuan_mk_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}