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
        <div class="col-md-12 text-center {{ Session::get('type') == 'OneToMany' ? 'bg-primary' : '' }}">
            <h4>One To Many</h4>
            <hr>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table table-bordered" border="1">
                <thead>
                    <tr>
                        <th scope="col">SL.</th>
                        <th scope="col">Post</th>
                        <th scope="col">Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($posts)
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($posts as $post)
                            <tr>
                                <tH>{{ $i++ }}</th>
                                <td width="25%">{{ $post->post }}</td>
                                <td>
                                    <small><span class="bg-info">Total Comments : {{ $post->comments_count}}, </span> </small>
                                    @forelse ($post->comments as $comment)
                                        <small>{{ $comment->comment }}</small>
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
                            <td>{{ $comment->post->post }}</td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <th scope="row" colspan="2" class="text-danger">No Data Available To Display</th>
                        </tr>
                    @endforelse --}}

                </tbody>
            </table>
        </div>
        {{-- End One To Many --}}
    </div>
    </div>
@endsection
