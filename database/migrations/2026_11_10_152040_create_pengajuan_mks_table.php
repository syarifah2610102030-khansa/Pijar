<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_mk', function (Blueprint $t) {
    $t->id();
    $t->string('kode_pengajuan', 30)->unique();           // contoh: PGJ-2026-0001
    $t->foreignId('prodi_id')->constrained('prodi')->restrictOnDelete();
    $t->foreignId('mata_kuliah_id')->constrained('mata_kuliah')->restrictOnDelete();
    $t->string('program', 10);                            // PIJAR / SUAR / KEDUANYA
    $t->string('semester', 10);                           // ganjil / genap
    $t->string('tahun_ajaran', 9);                        // 2026/2027
    $t->foreignId('diajukan_oleh')->constrained('users')->restrictOnDelete();
    $t->foreignId('dosen_pengampu_id')->nullable()->constrained('users')->nullOnDelete();
    $t->unsignedSmallInteger('jumlah_mahasiswa')->nullable();
    $t->dateTime('tgl_pengajuan')->nullable();
    $t->string('status', 20)->default('draft')->index();
    $t->text('catatan')->nullable();
    $t->timestamps();

    $t->unique(['mata_kuliah_id', 'program', 'semester', 'tahun_ajaran'], 'uq_pengajuan_per_periode');
    $t->index(['tahun_ajaran', 'semester']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_mks');
    }
};
