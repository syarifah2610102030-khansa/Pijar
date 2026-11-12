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
        Schema::create('approval_log', function (Blueprint $t) {
    $t->id();
    $t->foreignId('pengajuan_mk_id')->constrained('pengajuan_mk')->cascadeOnDelete();
    $t->foreignId('admin_id')->constrained('users')->restrictOnDelete();
    $t->string('keputusan', 20);                          // disetujui / ditolak / revisi
    $t->text('catatan')->nullable();
    $t->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_logs');
    }
};
