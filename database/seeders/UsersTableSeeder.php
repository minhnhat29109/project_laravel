<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Admin',
            'role' => -1,
            'email' => 'damminhnhat291098'.'@gmail.com',
            'password' => bcrypt('minhnhat2910'),
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'role' => 1,
            'email' => 'damminhnhat1'.'@gmail.com',
            'password' => bcrypt('minhnhat2910'),
        ]);
    }
}