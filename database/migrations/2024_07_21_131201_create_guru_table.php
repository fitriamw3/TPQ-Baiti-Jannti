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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nik_guru', 16);
            $table->string('nama_guru', 50);
            $table->date('tgl_lahir_guru');
            $table->string('tmpt_lahir_guru', 50);
            $table->unsignedTinyInteger('usia_guru'); 
            $table->enum('jenis_kelamin_guru', ['L', 'P']);
            $table->string('tlpn_guru', 13);
            $table->text('alamat_guru');
            $table->string('foto_guru');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
