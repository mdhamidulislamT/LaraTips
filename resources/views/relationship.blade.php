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
            <h1>Laravel relationships</h1>
        </div>

        <div class="col-md-6">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">User</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Hamid</th>
                    <td>01822004343</td>
                  </tr>
                </tbody>
              </table>
        </div>

        
            
            
        </div>
    </div>

@endsection
