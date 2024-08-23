<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guru')->insert([
            'user_id' => 1,
            'nama_guru' => 'Guru1',
            'nik_guru' => '1234567753245436',
            'tgl_lahir_guru' => '2003-12-03',
            'tmpt_lahir_guru' => 'Guru1',
            'usia_guru' => '21',
            'jenis_kelamin_guru' => 'P',
            'alamat_guru' => 'Srikandi',
            'foto_guru' => 'public/assets/img/about.jpg',
        ]);
    }
}
