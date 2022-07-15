@extends('layouts.master')

@section('title', 'Cache')
@push('style')
    <style>
        li {
            color: red;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Response</h3>
        </div>
        <div class="col-md-12 text-center text-danger">
            <h5>Response</h5>
        </div>
    </div>
@endsection
