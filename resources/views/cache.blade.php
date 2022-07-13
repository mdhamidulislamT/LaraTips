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
            <h3>Cache (database)</h3>
        </div>
        {{-- Start Post --}}
        <br><br>
        <div class="col-md-12 text-center text-danger">
            <h5>All Posts</h5>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered" border="1">
                <thead>
                    <tr>
                        <th scope="col">SL.</th>
                        <th scope="col">Post</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($posts)
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($posts as $data)
                            <tr>
                                <tH>{{ $i++ }}</th>
                                <td>{{ $data->post }}
                                </td>
                                {{-- <td>
                                    @forelse ($data->categories as $category)
                                        <small>{{ $category->name }}</small>
                                        @if (!$loop->last)
                                            <strong>,</strong>
                                        @endif
                                    @empty
                                    @endforelse
                                </td> --}}
                            </tr>
                        @empty
                            <tr class="text-center">
                                <th scope="row" colspan="2" class="text-danger">No Data Available To Display</th>
                            </tr>
                        @endforelse
                    @endisset
                </tbody>
            </table>
        </div>
        {{-- Start Post --}}
    </div>
    </div>
@endsection
