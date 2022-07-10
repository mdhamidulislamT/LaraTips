<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Throwable;
use Illuminate\Support\Facades\DB;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('crud.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $product = new Product();
            $product->title = $request->product;
            $product->slug =  Str::slug($request->product);
            $product->price = rand(50, 20);
            $product->quantity = rand(10, 50);
            $product->views = rand(1000, 5000);
            $product->is_active = true;
            $product->save();

            $message = "Product Added Successfully!";
            DB::commit();
            return redirect()->route('crud.create')->with('success', $message);
        } catch (Throwable $e) {

            DB::rollBack();
            $message = "Error! please try again.";
            return redirect()->route('crud.create')->with('error', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('crud.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $product = Product::find($id);
            $product->title = $request->product;
            $product->save();

            $message = "Product updated Successfully!";
            DB::commit();
            return redirect()->route('crud.index')->with('success', $message);
        } catch (Throwable $e) {

            DB::rollBack();
            $message = "Error! please try again.";
            return redirect()->route('crud.index')->with('error', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();
            $message = "Product Deleted!";
            return redirect()->route('crud.index')->with('success', $message);
        } catch (Throwable $e) {

            $message = "Error! please try again.";
            return redirect()->route('crud.index')->with('error', $message);
        }
    }
}
