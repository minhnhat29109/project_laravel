<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_info')->truncate();
        for ($i=1; $i < 20; $i++) { 
            DB::table('users_info')->insert([
                'address' => 'Ha Noi',
                'phone' => '1234567',
                'user_id' => $i
            ]);
        }
    }
}
