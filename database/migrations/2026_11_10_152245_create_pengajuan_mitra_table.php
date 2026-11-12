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
        Schema::create('pengajuan_mitra', function (Blueprint $t) {
    $t->id();
    $t->foreignId('pengajuan_mk_id')->constrained('pengajuan_mk')->cascadeOnDelete();
    $t->foreignId('mitra_id')->constrained('mitra')->restrictOnDelete();
    $t->string('peran_mitra', 100)->nullable();
    $t->foreignId('diisi_oleh')->constrained('users')->restrictOnDelete();
    $t->timestamps();
    $t->unique(['pengajuan_mk_id', 'mitra_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_mitra');
    }
};
