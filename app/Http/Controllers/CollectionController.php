<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\LazyCollection;
use DataTables;


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


    public function chunk()
    {
        $products = Product::all();
        $collection = collect($products);

        $chunks = $collection->chunk(4); // All Products divided by 4 [Example 23/4 = 5 Array]

        //return $chunks->count();
        return $chunks;



        /*
        $collection2 = collect($products);
        return $collection2->random();
        return $collection2->random(3);
        */
    }

    public function cache()
    {
        //$posts = Post::take(4)->get();

        $posts = Cache::remember('posts', 30, function(){
            return Post::all();
        }); 
        
        return view('cache', compact('posts'));

        /* $posts = Cache::remember('posts', 30, function () {
            return Blog::take(500)->get();
        }); */

        return view('cache', compact('posts'));
    }

    //====== Yajra Datatables ======//
    public function postIndex()
    {
        return view('post.index');
    }

    public function getPosts(Request $request)
    {
        if ($request->ajax()) {
            //$data = Blog::latest()->get();
            $data = Blog::take(5000)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm" onclick="edit('.$row['id'].')">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" onclick="delete('.$row['id'].')">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function editPost(Request $request)
    {
        $result = Blog::find($request->id);
        return response()->json($result);
    }

    public function deletePost(Request $request)
    {
        $result = Blog::find($request->id);
        return response()->json($result);
    }
}
