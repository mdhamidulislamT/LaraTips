@extends('layouts.master')

@section('title', 'Validation')
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
            <h1>Laravel Validation</h1>
        </div>

        <div class="col-md-3"></div>

        <div class="col-md-6">
            <h4>Form 1</h4>
            <form>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="First Name" aria-label="FirstName">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" placeholder="Last Name" aria-label="lasttName">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Address 1" aria-label="address1">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" placeholder="Address 2" aria-label="address2">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
