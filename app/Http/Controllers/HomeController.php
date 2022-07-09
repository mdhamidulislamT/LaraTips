<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Scopes\ActiveScope;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;



class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function profile()
    {
        return view('about-us');
    }
    
    public function viewAndBlade()
    {
        $data = [
            'teams' => [
                'team A',
                'team B',
                'team C',
                'team D',
                'team E',
                'team F',
            ],
            'users' => []
        ];

        return view('views-blade', $data);
    }

    public function blog()
    {
        return view('blog');
    }

    public function getBlog()
    {
        //===== Get Multiple Data =====//
        $blogs = Blog::whereIn('id', [1, 2, 3])->get();
        //===== Delete Multiple Data =====//
        // $blogs = Blog::whereIn('id', [1, 2, 3])->delete();
        return $blogs;

        



          /*$blog = new Blog();
        $blog->title = "This is third Blog title";
        $blog->save();
        return $blog->id ;*/
    }


    public function product()
    {
        /*$title = "samsung galaxy s23";

        $product = new Product();
        $product->title = $title;
        $product->slug = Str::slug($title);
        $product->price = 1000;
        $product->is_active = true;
        $product->save();
        return $product->id ;*/

        /*
        Get All Products

        $products = Product::get();
        return $products; 
        */


        /*Get single Product
        
        $product = Product::find(1);
        return $product; 
        */


        /*
            How to use scope 
       
        // $products = Product::active()->price()->get();
        $products = Product::canBeBought()->get();
        return $products;  
        */

         /*
            How to use Global scope 
        */
        $products = Product::price()->get();
        return $products;  
       
    }

    public function productDelete()
    {

        /* 
            delete model
        
        $product = Product::find(8);
        $product->delete(); */

        return "Deleted";
    }


    public function array()
    {
        $countries = [
            "Bangladesh",
            "Finland",
            "Pakistan",
            "Turkey",
            "Norway",
        ];
        $country = "Turkey";
        $result = in_array($country, $countries); // return true/false
        //$result = array_search($country, $countries); // return index
        return $result;
    }
}
