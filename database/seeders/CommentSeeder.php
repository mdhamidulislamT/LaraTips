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
        $commentArray = ["One", "Two", "Three", "Four",  "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen", "Twenty", "Twenty One", "Twenty Two", "Twenty Three", "Twenty Four", "Twenty Five", "Twenty Six", "Twenty Seven", "Twenty Eight", "Twenty Nine", "Thirteen"];
        // 1
        for ($i=0; $i <9; $i++) { 
            DB::table('comments')->insert([
                'post_id' => ($i+1),
                'comment' => "This is Test Comment ".$commentArray[$i]
            ]);
        }
        // 2
        for ($i=0; $i <30; $i++) { 
            $random = rand(1,9);
            DB::table('comments')->insert([
                'post_id' => $random,
                'comment' => "This is Test Comment ".$commentArray[$i]
            ]);
        }
    }
}
