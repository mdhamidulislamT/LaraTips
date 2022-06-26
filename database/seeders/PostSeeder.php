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
        for ($i = 1; $i < 25; $i++) {
            DB::table('posts')->insert([
                'post_title' => "Software engineering post_title ".$i,
                'post_description' => "Software engineering is a detailed study of engineering to the design, development and maintenance of software. post_description ".$i
            ]);
        }
    }
}
