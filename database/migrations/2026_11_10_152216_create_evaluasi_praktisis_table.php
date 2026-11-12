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
        Schema::create('evaluasi_praktisi', function (Blueprint $t) {
    $t->id();
    $t->foreignId('pengajuan_mk_id')->constrained('pengajuan_mk')->cascadeOnDelete();
    $t->foreignId('praktisi_id')->constrained('praktisi')->restrictOnDelete();
    $t->foreignId('dosen_id')->constrained('users')->restrictOnDelete();
    $t->decimal('skor', 4, 2)->nullable();
    $t->text('catatan')->nullable();
    $t->string('link_gform')->nullable();
    $t->date('tgl_evaluasi')->nullable();
    $t->timestamps();
    $t->unique(['pengajuan_mk_id', 'praktisi_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_praktisis');
    }
};
