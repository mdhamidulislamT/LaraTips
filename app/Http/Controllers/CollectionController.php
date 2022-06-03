<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;


class CollectionController extends Controller
{
    public function index()
    {
        //return collect([1, 2, 3,4,5,6,7,8,9])->sum();
        //return collect([1, 2, 3,4,5,6,7,8,9])->max();

        //$data1 = collect([1, 2, 3,4,5,6,7,8,9]);
        //$data2 = collect([9,10, 11]);
        //return $data1->concat($data2);
        //return $data1->concat($data2)->unique();
        //return $data1->concat($data2)->unique()->keys();
        //return $data1->concat($data2)->unique()->values();


        //return collect([1, 2, 3,4,5,6,7,8,9])->contains(7);

        //return Product::get()->take(5)->sum('price');
        //return Product::get()->take(5)->average('price');
        //return Product::get()->take(5)->contains('price', 1500);
        //return Product::get()->take(5)->first();
        //return Product::get()->take(7)->last();


        /*
        return Product::get()->map(function($product){
            return $product->title;
        });
        */


        //return Product::get()->pluck('title', 'id');


        /*
        return Product::get()->filter(function($product){
            return $product->price > 2000;
        });
        */


        //return dd(Product::get()->toArray());

        /*
        return Product::get()->where('price', '>', 700)
        ->map(function ($product){
            $product->totalPrice = $product->price * $product->quantity;
            return $product;
        });
        */

        /*
        return Product::get()->where('price', '>', 700)
        ->map(function ($product){
            $product->totalPrice = $product->price * $product->quantity;
            return $product;
        })
        ->sum('totalPrice');
        */

        /*
        $items = Product::get()->take(5);
        return $items->map->title;

        OE
        return Product::get()->take(5)->map->title;
        */

        //return Product::get()->filter->is_active;




        // Collection Advance
        
        //$collections = Collection::times(100000);
        $collections = LazyCollection::times(100000);
        foreach ($collections as $l) {
            echo $l . "gdg<br>";
        }

        echo "Done";
        

       
    }
}
