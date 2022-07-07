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
        {{-- Start One To One --}}
        <div class="col-md-12 text-center {{ Session::get('type') == 'OneToOne' ? 'bg-primary' : '' }}">
            <h4>One To One</h4>
            <hr>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">Mobile Set Name</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($users)
                        @forelse ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->name }}</th>
                                <td>{{ $user->phone->name }}</td>
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
        {{-- End One To One --}}
    </div>
    </div>
@endsection
