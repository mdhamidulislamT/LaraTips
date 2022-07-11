@extends('layouts.master')

@section('title', 'relationship')
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
            <h3>Eloquent Relationship</h3>
        </div>
        {{-- Start One To Many --}}
        <div class="col-md-12 text-center {{ Session::get('type') == 'hasManyThrough' ? 'bg-primary' : '' }}">
            <h4>hasManyThrough</h4>
            <hr>
        </div>
        {{-- Start Post has Categories --}}
        <br><br>
        <div class="col-md-12 text-center text-danger">
            <h5>Country<strong class="text-dark">-></strong>User<strong class="text-dark">-></strong>Post <span class="text-dark">(3 tables)</span></h5>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered" border="1">
                <thead>
                    <tr>
                        <th scope="col">SL.</th>
                        <th scope="col">country</th>
                        <th scope="col">Total Post</th>
                        <th scope="col" width="50%">Posts</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($countries)
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($countries as $country)
                            <tr>
                                <tH>{{ $i++ }}</th>
                                <td>{{ $country->name }}</td>
                                <td>{{ $country->posts->count() }}</td>
                                <td>
                                    @forelse ($country->posts as $post)
                                        {{ $post->post }}
                                    @empty
                                        
                                    @endforelse
                                </td>
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
        {{-- Start Post has Categories --}}


        {{-- Start Category has Posts --}}
        <br><br>
      {{--   <div class="col-md-12 text-center text-danger">
            <h5>Category has multiple posts</h5>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered" border="1">
                <thead>
                    <tr>
                        <th scope="col">SL.</th>
                        <th scope="col">Category</th>
                        <th scope="col">Post</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($posts)
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($categories as $category)
                            <tr>
                                <tH>{{ $i++ }}</th>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @forelse ($category->posts as $post)
                                          {{ $post->post }}
                                        @if (!$loop->last)
                                            <strong>,</strong>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <th scope="row" colspan="2" class="text-danger">No Data Available To Display</th>
                            </tr>
                        @endforelse
                    @endisset
                </tbody>
            </table>
        </div> --}}
        {{-- Start Category has Posts --}}
        {{-- End One To Many --}}
    </div>
    </div>
@endsection
