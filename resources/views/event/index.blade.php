@extends('layouts.master')

@section('title', 'event listener')


@section('content')

    <div class="row my-2 ">
        <div class="col-md-12 text-center">
            <h1>event & listener</h1>
        </div>
        <div class="col-md-6 offset-2 text-center">

            <form action="{{ route('event.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <x-label text="Title" />
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                        aria-describedby="title" value="{{ old('title') }}">
                    @error('title')
                        <x-input-error-msg message="{{ $message }}" />
                    @enderror
                    <x-label text="Number" />
                    <input type="text" class="form-control @error('number') is-invalid @enderror" name="number" id="number"
                        aria-describedby="number" value="{{ old('number') ? old('number') : 1  }}">
                    @error('number')
                        <x-input-error-msg message="{{ $message }}" />
                    @enderror
                    <div class="py-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5 ">Submit</button>
                    </div>
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
            <table class="table table-bordered border-primary" width="100%">
                <h4>Total Blog : {{ number_format($totalBlog, 1) }}</h4>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                        <tr>
                            <th scope="row">{{ $blog->id }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->created_at }}</td>
                        </tr>
                    @empty
                        <p>No blogs Available</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('javascripts')

    <script></script>

@endsection
