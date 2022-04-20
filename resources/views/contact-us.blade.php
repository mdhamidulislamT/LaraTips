@extends('layouts.master')

@section('title', 'Home')
@push('style')
    <style>
        li{
            color: red;
        }
    </style>
@endpush

@section('content')



    <div>
        <h1>Welcome To Contact Us Page</h1>

        <hr>
        <h3> forelse Loop</h3>

        @forelse ($teams as $team)


            @if ($loop->first)
                This is the first iteration.
            @endif

            <li>{{ $loop->index }} {{  $team }}</li>

            @if ($loop->last)
                This is the last iteration.
            @endif

        @empty
            <p>No users</p>
        @endforelse

        <hr>

        @forelse ($users as $user)
            <li>{{ $user }}</li>
        @empty
            <p>No users</p>
        @endforelse

    </div>

@endsection
