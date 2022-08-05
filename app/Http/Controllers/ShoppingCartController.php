<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Warehouse;

class ShoppingCartController extends Controller
{
    public function index()
    {
        //return $product = Category::find(2)->products;
        /* $products =  Category::with('products')->get();
        return $products; */
        /* $products =  Product::with('categories')->get();
        return $products; */

        $products = Product::all();
        $categories = Category::all();
        $warehouses = Warehouse::all();
        return view('shopping-cart', compact('warehouses', 'categories', 'products'));
    }
    
    public function getCategoryWiseProducts(Request $request)
    {
        $products = Category::findOrFail($request->id)->products;
        return response()->json($products);
    }
}
