<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ownerArray = ["Owner One", "Owner Two", "Owner Three"];
        for ($i=0; $i <3; $i++) { 
            DB::table('owners')->insert([
                'car_id' => ($i+1),
                'country_id' => ($i+1),
                'name' => $ownerArray[$i]
            ]);
        }

        for ($i=1; $i <15; $i++) { 
            DB::table('owners')->insert([
                'car_id' => ($i+1),
                'country_id' => rand(1,3),
                'name' => "Owner Test-".$i.''.$i
            ]);
        }
    }
}
