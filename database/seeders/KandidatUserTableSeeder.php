<?php

namespace Database\Seeders;

use App\Models\Kandidat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KandidatUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('role', 'User')->pluck('id')->toArray();
        $kandidats = Kandidat::pluck('id')->toArray();

        foreach ($users as $userId) {
            $randomKandidatIds = array_rand($kandidats, 9);

            foreach ($randomKandidatIds as $kandidatId) {
                DB::table('kandidat_user')->insert([
                    'user_id' => $userId,
                    'kandidat_id' => $kandidats[$kandidatId],
                ]);
            }
        }
        
    }
}
