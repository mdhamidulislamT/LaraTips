<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number = 20;
        $title = "samsung galaxy s";
        for ($i = 0; $i < 15; $i++) {
            $titleMore = $title.$number;

            $product = new Product();
            $product->title = $titleMore;
            $product->slug = Str::slug($titleMore);
            $product->price = random_int(100, 1000);
            $product->quantity = random_int(1, 20);
            $product->views = random_int(100, 1000);
            $product->is_active = true;
            $product->save();

            $number++;
        }

        return $product->id;
    }
}
