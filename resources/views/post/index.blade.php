@extends('layouts.master')

@section('title', 'Yajra Datatables')
@push('style')
    <style>
        li {
            color: red;
        }
    </style>
@endpush

@section('content')

    <div class="container">
        <h2> Yajra Datatables Example</h2>
        <table class="table table-bordered yajra-datatable">
            @csrf
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
@section('javascripts')

    <script type="text/javascript">
        $(function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('getPosts') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'content',
                        name: 'content'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_time',
                        name: 'updated_time'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });

        function edit(id) {
            var _token = $('input[name="_token"]').val();
            var fd = new FormData();
            fd.append('id', id);
            fd.append('_token', _token);
            $.ajax({
                url: "{{ route('editPost') }}",
                method: "POST",
                data: fd,
                contentType: false,
                processData: false,
                datatype: "json",
                success: function(success) {
                    console.log(success);
                },
                error: function(error) {
                    console.log(error);
                    $("#barcodeError").text("No such product available in your system 1 " + JSON.stringify(
                        error));
                }
            });
        }

        
    </script>

@endsection
