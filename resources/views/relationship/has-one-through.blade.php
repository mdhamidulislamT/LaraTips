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
        <div class="col-md-12 text-center {{ Session::get('type') == 'hasOneThrough' ? 'bg-primary' : '' }}">
            <h4>hasOneThrough</h4>
            <hr>
        </div>
        {{-- Start Post has Categories --}}
        <br><br>
        <div class="col-md-12 text-center text-danger">
            <h5>Mechanic<strong class="text-dark">-></strong>Car<strong class="text-dark">-></strong>Owner <span class="text-dark">(3 tables)</span></h5>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered" border="1">
                <thead>
                    <tr>
                        <th scope="col">SL.</th>
                        <th scope="col">Mechanic</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Car Owner</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($mechanics)
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($mechanics as $mechanic)
                            <tr>
                                <tH>{{ $i++ }}</th>
                                <td>{{ $mechanic->name }}</td>
                                <td>{{ $mechanic->car->model }}</td>
                                <td>{{ $mechanic->carOwner->name }}</td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <th scope="row" colspan="2" class="text-danger">No Data Available To Display</th>
                            </tr>
                        @endforelse
                    @endisset

                    {{-- @forelse ($comments as $comment)
                        <tr>
                            <td>111</td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->post->post_title }}</td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <th scope="row" colspan="2" class="text-danger">No Data Available To Display</th>
                        </tr>
                    @endforelse --}}

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
