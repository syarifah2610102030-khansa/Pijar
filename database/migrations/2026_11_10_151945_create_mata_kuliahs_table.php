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
        Schema::create('mata_kuliah', function (Blueprint $t) {
    $t->id();
    $t->string('kode_mk', 20)->unique();
    $t->string('nama_mk');
    $t->unsignedTinyInteger('sks');
    $t->foreignId('prodi_id')->constrained('prodi')->restrictOnDelete();
    $t->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};
