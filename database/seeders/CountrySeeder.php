<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countriesArray = ["Bangladesh", "Pakistan", "Turkey"];
        for ($i=0; $i <3; $i++) { 
            DB::table('countries')->insert([
                'name' => $countriesArray[$i]
            ]);
        }
    }
}
