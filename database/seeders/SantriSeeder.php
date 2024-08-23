<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('santri')->insert([
            'nama_santri' => 'santri1',
            'kelas' => 'A',
            'nik_santri' => '1234567753245436',
            'tgl_lahir_santri' => '2003-12-03',
            'tmpt_lahir_santri' => 'Pontianak',
            'usia_santri' => '11',
            'jenis_kelamin_santri' => 'P',
            'alamat_santri' => 'Srikandi',
            'foto_santri' => 'public/assets/img/about.jpg',
            'tgl_masuk' => '2021-12-02',
            'ayah_santri' => 'Joko',
            'ibu_santri' => 'Mawar',
            'wali_santri' => '',
            'tlpn_ortu_santri' => '081352525586',
            'pendidikan_santri' => 'SD'
        ]);
    }
}
