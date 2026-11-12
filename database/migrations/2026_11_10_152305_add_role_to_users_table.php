<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $t) {
            $t->string('role', 20)->default('dosen')->after('password')->index();
            $t->foreignId('prodi_id')->nullable()->after('role')
              ->constrained('prodi')->nullOnDelete();
            $t->string('nidn', 20)->nullable()->after('prodi_id');
            $t->boolean('aktif')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $t) {
            $t->dropConstrainedForeignId('prodi_id');
            $t->dropColumn(['role', 'nidn', 'aktif']);
        });
    }
};