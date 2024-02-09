<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'site_title' => 'Sistem Evoting',
                'login_page_title' => 'Elektronik Voting Ranting',
                'header_title' => 'Menggerakkan Dakwah dan Pembangunan Menuju Pondok Cabe Udik Berkemajuan.',
                'sub_title' => 'Elektronik Voting Untuk Ranting ini dibuat untuk mensukseskan Musyawarah Ranting Muhammadiyah & Aisyiyah Pondok Cabe Udik Tahun 2023. Dikembangkan Oleh Majelis Teknologi Informasi dan Komunikasi Pemuda Muhammadiyah Ranting Pondok Cabe Udik.',
                'min_pilih'	=> 0,
                'max_pilih' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
