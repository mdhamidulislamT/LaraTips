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
        <div class="col-md-12 text-center {{ Session::get('type') == 'ManyToMany' ? 'bg-primary' : '' }}">
            <h4>Many To Many <small class="text-white">(required a pivot table)</small></h4>
            <hr>
        </div>
        {{-- Start Post has Categories --}}
        <br><br>
        <div class="col-md-12 text-center text-danger">
            <h5>Post has multiple categories</h5>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered" border="1">
                <thead>
                    <tr>
                        <th scope="col">SL.</th>
                        <th scope="col">Post</th>
                        <th scope="col">Category</th>
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
                                <td>
                                    @forelse ($data->categories as $category)
                                        <small>{{ $category->name }}</small>
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
        <div class="col-md-12 text-center text-danger">
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
        </div>
        {{-- Start Category has Posts --}}
        {{-- End One To Many --}}
    </div>
    </div>
@endsection
