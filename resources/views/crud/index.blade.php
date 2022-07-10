@extends('layouts.master')

@section('title', 'Add To Cart')


@section('content')

    <div class="row my-2">
        <div class="col-md-10 text-center">
            <h1>crud resource</h1>
        </div>
        <div class="col-md-2 text-center">
            <a class="btn btn-success" href="{{ route('crud.create') }}" role="button">Add Product</a>
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
            <table class="table table-bordered border-primary" width="100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col" width="20%">Quantity</th>
                        <th scope="col" width="20%">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a class="btn btn-success d-inline" href="{{ route('crud.edit', $product->id) }}"
                                    role="button">Edit</a>
                                <form class="d-inline" action="{{ route('crud.destroy', $product->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>No Products</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('javascripts')

    <script></script>

@endsection
