<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 25; $i++) { 
            DB::table('comments')->insert([
                'post_id' => $i,
                'comment_description' => "Software engineering is a detailed study of engineering to the design, comments ".$i
            ]);
        }
    }
}
