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
            <form action="{{ route('admin.validation.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <x-label text="First Name" />
                    <input type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" id="fname"
                        aria-describedby="fname" value="{{ old('fname') }}">
                    @error('fname')
                        <x-input-error-msg message="{{ $message }}" />
                    @enderror
                </div>
                <div class="mb-3">
                    <x-label text="Last Name" />
                    <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" id="lname"
                        aria-describedby="lname" value="{{ old('lname') }}">
                    @error('lname')
                        <x-input-error-msg message="{{ $message }}" />
                    @enderror
                </div>
                <div class="mb-3">
                    <x-label text="Phone Number" />
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone"
                        aria-describedby="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <x-input-error-msg message="{{ $message }}" />
                    @enderror
                </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <x-label text="Address 1" />
                <input type="text" class="form-control @error('address1') is-invalid @enderror" name="address1"
                    id="address1" aria-describedby="address1" value="{{ old('address1') }}">
                @error('address1')
                    <x-input-error-msg message="{{ $message }}" />
                @enderror
            </div>
            <div class="mb-3">
                <x-label text="Address 2" />
                <input type="text" class="form-control @error('address2') is-invalid @enderror" name="address2"
                    id="address2" aria-describedby="address2" value="{{ old('address2') }}">
                @error('address2')
                    <x-input-error-msg message="{{ $message }}" />
                @enderror
            </div>
            <div class="py-4">
                <button type="submit" class="btn btn-primary btn-lg px-5">Submit</button>
            </div>
            </form>
        </div>
    </div>

@endsection
