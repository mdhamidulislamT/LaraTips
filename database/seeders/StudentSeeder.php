<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personsArray = ["Mr Jhon", "Mr Mike", "Mr Alzin", "Mr Markin", "Mr Morgan", "Mr Devid", "Mrs Julia", "Mrs Torin", "Mr Warner", "Mr Zack"];
        $len = count($personsArray);

        for ($i=0; $i <$len; $i++) { 
            $random = rand(1,3);
            DB::table('students')->insert([
                'country_id' => $random,
                'name' => $personsArray[$i]
            ]);
        }
    }
}
