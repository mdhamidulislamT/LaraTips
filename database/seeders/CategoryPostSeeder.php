<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=9; $i++) { 
            $random = rand(1,9);
            $random2 = rand(1,9);
            DB::table('category_post')->insert([
                'category_id' => $random,
                'post_id' => $random2,
            ]);
        }
    }
}
