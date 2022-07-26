@extends('layouts.master')

@section('title', 'Queue - Update Big Data')


@section('content')

    <div class="row my-2 ">
        <div class="col-md-12 text-center">
            <h1>Queue (Update Big Data) <span class="text-danger"> Total Blog : {{ number_format($totalBlog, 1) }}</span></h1>
        </div>
        <div class="col-md-6 offset-2 text-center">
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
            </div>
            <form action="{{ route('queue.updateBigData') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <x-label text="Number Of Data" />
                    <input type="number" min="0" maxlength="6" class="form-control @error('numberOfData') is-invalid @enderror" name="numberOfData" id="numberOfData"
                        aria-describedby="numberOfData" value="{{ old('numberOfData') }}" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    @error('numberOfData')
                        <x-input-error-msg message="{{ $message }}" />
                    @enderror
                    <div class="py-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5 ">Update Big Data</button>
                    </div>
                </div>

             </form>
        </div>
    </div>

@endsection

@section('javascripts')

    <script></script>

@endsection
