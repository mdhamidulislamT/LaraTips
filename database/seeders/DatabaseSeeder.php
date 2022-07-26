<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ProductSeeder::class,
            PostSeeder::class,
            CarSeeder::class,
            MechanicSeeder::class,
            OwnerSeeder::class,
            StudentSeeder::class,
            CommentSeeder::class,
            CategorySeeder::class,
            CategoryPostSeeder::class,
            CountrySeeder::class,
            UserSeeder::class,
            PhoneSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
