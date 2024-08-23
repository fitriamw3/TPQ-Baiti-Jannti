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
        Schema::create('santri', function (Blueprint $table) {
            $table->id();
            $table->string('nik_santri', 16)->nullable();
            $table->string('nama_santri', 50);
            $table->date('tgl_lahir_santri');
            $table->string('tmpt_lahir_santri', 50);
            $table->unsignedTinyInteger('usia_santri');
            $table->enum('jenis_kelamin_santri', ['L', 'P']);
            $table->text('alamat_santri');
            $table->set('pendidikan_santri', ['TK', 'SD', 'SMP', 'SMA', 'Belum Sekolah']); 
            $table->binary('foto_santri');
            $table->string('ayah_santri', 50)->nullable();
            $table->string('ibu_santri', 50)->nullable();
            $table->string('wali_santri', 50)->nullable();
            $table->string('tlpn_ortu_santri', 13);
            $table->boolean('terverifikasi')->default(false);
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri');
    }
};
