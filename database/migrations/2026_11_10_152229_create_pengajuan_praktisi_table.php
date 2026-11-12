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
        Schema::create('pengajuan_praktisi', function (Blueprint $t) {
    $t->id();
    $t->foreignId('pengajuan_mk_id')->constrained('pengajuan_mk')->cascadeOnDelete();
    $t->foreignId('praktisi_id')->constrained('praktisi')->restrictOnDelete();
    $t->string('peran', 50)->nullable();                  // pemateri, co-teaching, dll
    $t->foreignId('diisi_oleh')->constrained('users')->restrictOnDelete();
    $t->timestamps();
    $t->unique(['pengajuan_mk_id', 'praktisi_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_praktisi');
    }
};
