<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postArray = ["One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten"];
        $postArray2 = ["Twenty"];
        for ($i = 0; $i <=9; $i++) {
            DB::table('posts')->insert([
                'post' => "This is Test Post - ".$postArray[$i],
                'user_id' => rand(1,15),
            ]);
        }
        for ($i = 0; $i <=9; $i++) {
            DB::table('posts')->insert([
                'post' => "This is Test Post - ".$postArray2[0] .' '.$postArray[$i],
                'user_id' => rand(1,15),
            ]);
        }
    }
}
