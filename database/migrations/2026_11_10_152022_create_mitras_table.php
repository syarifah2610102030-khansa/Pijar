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
       Schema::create('mitra', function (Blueprint $t) {
    $t->id();
    $t->string('nama_mitra');
    $t->string('jenis', 30)->nullable();      // industri, pemerintah, lembaga, ngo
    $t->string('nama_pic')->nullable();
    $t->string('email')->nullable();
    $t->string('no_hp', 20)->nullable();
    $t->string('no_pks')->nullable();         // nomor perjanjian kerja sama
    $t->date('tgl_mulai')->nullable();
    $t->date('tgl_berakhir')->nullable();
    $t->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
