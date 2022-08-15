@extends('layouts.master')

@section('title', 'CSV excel')


@section('content')

<div class="container">
    <div class="col-md-12">
        <table>
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>EmpID</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->emp_id }}</td>
                    <td>{{ $employee->first_name }}</td>
                    <td>{{ $employee->last_name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('javascripts')

    <script>

    </script>

@endsection
