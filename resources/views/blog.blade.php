@extends('layouts.master')

@section('title', 'blog')


@section('content')


    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Database - <span class="text-bolder">Model</span></h1>
        </div>
        <div class="col-md-12 text-center">
            <a class="text-success fs-2" href="{{ route('blogs') }}"> blogs </a> | 
            <a class="text-danger fs-2" href="{{ route('product') }}"> products </a> | 
            <a class="text-primary fs-2" href="{{ route('collection.index') }}"> collection </a> | 

        </div>
    </div>

@endsection
