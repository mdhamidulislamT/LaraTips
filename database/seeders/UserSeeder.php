<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstname = array(
            'Johnathon',
            'Anthony',
            'Erasmo',
            'Raleigh',
            'Nancie',
            'Tama',
            'Camellia',
            'Augustine',
            'Christeen',
            'Luz',
            'Diego',
            'Lyndia',
            'Thomas',
            'David',
            'Warker',
            'Mike'
        );
        $lastname = array(
            'Mischke',
            'Serna',
            'Pingree',
            'Mcnaught',
            'Pepper',
            'Schildgen',
            'Mongold',
            'Wrona',
            'Geddes',
            'Lanz',
            'Fetzer',
            'Schroeder',
            'Block',
            'Mayoral',
            'Fleishman',
            'Roberie',
            'Latson'
        );

        $len = count($lastname) - 1;
        for ($i=0; $i <$len; $i++) { 
            $random = rand(1,3);
            DB::table('users')->insert([
                'country_id' => $random,
                'name' => $lastname[$i].' '.$firstname[$i],
                'email' => $lastname[$i].'@gmail.com',
                'password' => Hash::make(12345678),
                'is_admin' => true,
            ]);
        }
    }
}
