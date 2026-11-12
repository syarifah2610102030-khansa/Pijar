<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_kuliah', function (Blueprint $t) {
            $t->id();
            $t->foreignId('pengajuan_mk_id')->constrained('pengajuan_mk')->cascadeOnDelete();
            $t->string('kelas', 20)->nullable();
            $t->string('hari', 10);
            $t->time('jam_mulai');
            $t->time('jam_selesai');
            $t->string('ruang')->nullable();
            $t->string('link_daring')->nullable();
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_kuliah');
    }
};