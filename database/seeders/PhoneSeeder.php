<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phoneArray = ["Huawei nova Y60", "Apple iPhone 13 Pro", "Huawei P50 Pro 4G", "Apple iPhone 13", "Apple iPhone 12 Pro", "Apple iPhone 11", "Apple iPhone 8", "Galaxy S22 Ultra", "Galaxy Note20 Ultra 5G", "Galaxy A53 5G", "Vivo Y21 (4/64GB)", "Realme GT Master (8/128GB)", "Redmi 10 2022 (4/64GB)", "Redmi Note 11 (8/128GB)", "POCO C31 (3/32GB)", "Walton Prime S19"];
        $len = count($phoneArray);
        for ($i = 0; $i <$len; $i++) {
            DB::table('phones')->insert([
                'name' => $phoneArray[$i],
                'user_id' => ($i+1),
            ]);
        }
    }
}
