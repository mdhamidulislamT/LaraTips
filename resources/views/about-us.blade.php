@extends('layouts.master')

@section('title', 'About Us')

@section('content')



    <div>
        <h1>Welcome To About Us Page</h1>
    </div>

    <x-alert type="alert-success" />
    <x-alert2 message="This is costome message in compenent" type="alert-primary" />

    <x-alert3>
        <h3>this is a slot message</h3>
    </x-alert3>


    <x-card>

        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>

    </x-card>

    <x-card>

        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title 2</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <a href="#" class="btn btn-primary">Go somewhere 2</a>
        </div>

    </x-card>


@endsection
