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
       Schema::create('praktisi', function (Blueprint $t) {
    $t->id();
    $t->string('nama');
    $t->string('instansi')->nullable();
    $t->string('jabatan')->nullable();
    $t->string('keahlian')->nullable();
    $t->string('email')->nullable();
    $t->string('no_hp', 20)->nullable();
    $t->boolean('aktif')->default(true);
    $t->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('praktisis');
    }
};
