<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatan_regis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kegiatan_id');
            $table->string('nama', 50);
            $table->date('tgl_lahir');
            $table->unsignedTinyInteger('usia');
            $table->enum('jenis_kelamin_santri', ['L', 'P']);
            $table->text('alamat');
            $table->binary('foto');
            $table->string('tlpn_ortu', 13);
            $table->timestamps();

            $table->foreign('kegiatan_id')->references('id')->on('kegiatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_regis');
    }
};
