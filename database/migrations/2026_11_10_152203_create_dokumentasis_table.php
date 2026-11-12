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
        Schema::create('dokumentasi', function (Blueprint $t) {
    $t->id();
    $t->foreignId('pengajuan_mk_id')->constrained('pengajuan_mk')->cascadeOnDelete();
    $t->string('jenis', 20);                              // foto, video, laporan, lainnya
    $t->string('judul');
    $t->string('file_path')->nullable();
    $t->string('url_eksternal')->nullable();              // jika video di YouTube/Drive
    $t->text('keterangan')->nullable();
    $t->foreignId('uploaded_by')->constrained('users')->restrictOnDelete();
    $t->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumentasis');
    }
};
