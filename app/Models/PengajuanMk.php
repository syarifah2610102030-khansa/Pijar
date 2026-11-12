<?php

namespace App\Models;

use App\Enums\Program;
use App\Enums\Role;
use App\Enums\StatusPengajuan;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'kode_pengajuan', 'prodi_id', 'mata_kuliah_id', 'program', 'semester',
    'tahun_ajaran', 'diajukan_oleh', 'dosen_pengampu_id', 'jumlah_mahasiswa',
    'tgl_pengajuan', 'status', 'catatan',
])]
class PengajuanMk extends Model
{
    protected $table = 'pengajuan_mk';

    protected function casts(): array
    {
        return [
            'program' => Program::class,
            'status' => StatusPengajuan::class,
            'tgl_pengajuan' => 'datetime',
        ];
    }

    // Otomatis membuat kode seperti PGJ-2026-0001 saat data dibuat
    protected static function booted(): void
    {
        static::creating(function (PengajuanMk $p) {
            $p->kode_pengajuan ??= sprintf(
                'PGJ-%d-%04d',
                now()->year,
                (static::max('id') ?? 0) + 1
            );
        });
    }

    // Batasi data yang terlihat sesuai role
    public function scopeVisibleTo(Builder $q, User $user): Builder
    {
        return match (true) {
            $user->hasRole(Role::Kaprodi, Role::Sekprodi) => $q->where('prodi_id', $user->prodi_id),
            $user->hasRole(Role::Dosen) => $q->where('dosen_pengampu_id', $user->id),
            default => $q, // semua admin melihat semuanya
        };
    }

    // Untuk halaman publik: hanya yang sudah disetujui ke atas
    public function scopePublik(Builder $q): Builder
    {
        return $q->whereIn('status', [
            StatusPengajuan::Disetujui,
            StatusPengajuan::Berjalan,
            StatusPengajuan::Selesai,
        ]);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function pengaju()
    {
        return $this->belongsTo(User::class, 'diajukan_oleh');
    }

    public function dosenPengampu()
    {
        return $this->belongsTo(User::class, 'dosen_pengampu_id');
    }

    public function approvalLogs()
    {
        return $this->hasMany(ApprovalLog::class);
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalKuliah::class);
    }

    public function rpsMini()
    {
        return $this->hasMany(RpsMini::class);
    }

    public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class);
    }

    public function evaluasi()
    {
        return $this->hasMany(EvaluasiPraktisi::class);
    }

    public function praktisi()
    {
        return $this->belongsToMany(Praktisi::class, 'pengajuan_praktisi')
            ->withPivot('peran', 'diisi_oleh')
            ->withTimestamps();
    }

    public function mitra()
    {
        return $this->belongsToMany(Mitra::class, 'pengajuan_mitra')
            ->withPivot('peran_mitra', 'diisi_oleh')
            ->withTimestamps();
    }
}