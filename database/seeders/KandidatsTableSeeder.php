<?php

namespace Database\Seeders;

use App\Models\Kandidat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KandidatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kandidats')->insert([
            [
                'nama_kandidat' => 'AGUS NIIN, H. S.Pd.,MM',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pondok Cabe Ilir 02', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'AHMAD GHOZALI, S.Pd.,MM',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pondok Benda 02', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'AJUM Drs.',
                'foto_kandidat' => NULL,
                'jabatan' => NULL, 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'ANITA SUPRIHARTINI, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Parakan2', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'ARSIN Drs.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pamulang 01', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'ASIH NURMALAYANTI, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pamulang Tengah', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'ENTIS SUTISNA, H.S.Pd. ',
                'foto_kandidat' => NULL,
                'jabatan' => NULL, 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'JAHUDI, H.S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pondok Benda 01', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'JAMHARI, H.S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => NULL, 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'JENANANG, H.S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => NULL, 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'MUMUH MUCHTAR BUDIARTO, M.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pamulang Timur 01', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'MUTIRI, Drs. H.MM',
                'foto_kandidat' => NULL,
                'jabatan' => 'NULL', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'NINA SRI HASTUTI, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Kampung Bulak 02', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'ONO SUMARNO, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pondok Cabe Ilir 03', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'PARMINAH, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pondok Cabe Udik 03', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'PRI HARTUTY, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Benda Baru 01', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'PUJO WIDODO, M.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Benda Baru 03', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'ROSTINAH, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Bambu Apus 02', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'SADIAH, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Kampung Bulak 03', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'SAMLAWI, S.Pd.,MM ',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pamulang 02', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'SITI FATIMAH, M.Ag.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Ciledug Timur', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'SOFYAN HADI, S.Pd.,MM',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pondok Cabe Udik 02', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'SOLIHIN, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Guru SDN Pondok Cabe Udik 03', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'SRI SUTARMI, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Benda Baru 02', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'SUAIB, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pondok Cabe Udik 01', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'SUTIYAH, S.Pd.',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pamulang Permai', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'SUWITO, S.Pd.,MM',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pamulang Indah', 
                'status' => 1,
            ],
              [
                'nama_kandidat' => 'WARJOKO, Drs.MM',
                'foto_kandidat' => NULL,
                'jabatan' => 'Kepala SDN Pondok Cabe Ilir 01', 
                'status' => 1,
            ],
          
    ]);
    }
}
