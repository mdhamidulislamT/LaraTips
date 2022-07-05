<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carArray = ["BMW-001", "Tayota-001", "Rado-001"];
        for ($i=0; $i <3; $i++) { 
            DB::table('cars')->insert([
                'mechanic_id' => ($i+1),
                'model' => $carArray[$i]
            ]);
        }
    }
}
