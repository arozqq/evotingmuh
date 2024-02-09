<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'fullname'	=> 'Administrator',
                    'username' => 'admin',
                    'password'	=> bcrypt('admin123n1h!*'),
                    'role' => 'Admin',
                    'submited' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],

            ]);
    }
}
