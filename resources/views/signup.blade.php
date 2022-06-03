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
            <h1>Laravel Form Validation</h1>
        </div>

        <div class="col-md-6">
            <form action="{{ route('signup') }}" method="POST">
                @csrf
                
                <input type="hidden" name="is_admin" value="1">
                <div class="mb-3">
                    <x-label text="Full Name" />
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                        aria-describedby="name" value="{{ old('name') }}">
                    @error('name')
                        <x-input-error-msg message="{{ $message }}" />
                    @enderror
                </div>
                <div class="mb-3">
                    <x-label text="Email Address" />
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                        aria-describedby="email" value="{{ old('email') }}">
                    @error('email')
                        <x-input-error-msg message="{{ $message }}" />
                    @enderror
                </div>
                <div class="mb-3">
                    <x-label text="Password" />
                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
                        aria-describedby="password" value="{{ old('password') }}">
                    @error('password')
                        <x-input-error-msg message="{{ $message }}" />
                    @enderror
                </div>
                <div class="py-1">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Submit</button>
                </div>
            </form>
        </div>

        
            
            
        </div>
    </div>

@endsection
