<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MechanicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ownerArray = ["Mechanic One", "Mechanic Two", "Mechanic Three"];
        for ($i=0; $i <3; $i++) { 
            DB::table('mechanics')->insert([
                'name' => $ownerArray[$i]
            ]);
        }
    }
}
