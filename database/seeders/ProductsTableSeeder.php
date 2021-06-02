<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=0; $i < 20 ; $i++) { 
            DB::table('products')->insert([
                'name' => 'Adidas',
                'slug' => 'didas',
                'origin_price' => '2000000',
                'sale_price' => '2000000',
                'user_id' => 1,
                'category_id' => 1
            ]);
        }
    }
}
