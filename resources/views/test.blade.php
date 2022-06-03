@extends('layouts.master')

@section('title', 'test')


@section('content')


    <div class="row">
        <h1> Resource Controller with name route </h1>
        <div class="col-md-6 offset-3">
            <form action="{{ route('test.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name">Student Name:*</label>
                    <input type="text" class="form-control" name="name" >
                </div>
                <div class="mb-3">
                    <label for="name">Roll No:*</label>
                    <input type="text" class="form-control" name="roll" >
                </div>
                <div class="mb-3">
                    <label for="name">reg No:*</label>
                    <input type="text" class="form-control" name="reg" >
                </div>
                <div class="py-4">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-6 offset-3">
            <h4><a href="{{ route('test.show', 101) }}">Show For Edit</a></h4>
                
        </div>
    </div>

@endsection
