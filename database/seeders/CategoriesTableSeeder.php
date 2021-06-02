<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Nam', 'Nữ', 'Thể thao'  
        ];
        DB::table('categories')->truncate();

        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }
        DB::table('categories')->insert([
            'name' => 'Điện thoại',
            'slug' => 'dien-thoai'
        ]);
    }
}
