@extends('layouts.master')

@section('title', 'Add To Cart')


@section('content')


    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Update Product</h1>
        </div>
        <div class="col-md-12 text-center">
            <form id="productForm" method="POST">
                @csrf
                <div class="row">
                </div>
            </form>
        </div>
        <div class="col-md-12 text-center">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif
            <form id="addProductForm" method="POST" action="{{ route('crud.update', $product->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-5">
                        <label for="warehouse">Warehouse</label>
                        <select class="form-select" id="warehouse" name="warehouse">
                            <option selected>Select Warehouse</option>
                            <option value="1">GEC Circle</option>
                            <option value="2">Bahaddarhat</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="products">Products</label>
                        <input type="text" class="form-control @error('product') is-invalid @enderror" name="product"
                            id="product" aria-describedby="product" placeholder=" Enter Product Name.."
                            value="{{ $product->title }}">
                    </div>
                    <div class="py-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('javascripts')

    <script></script>

@endsection
