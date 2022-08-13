@extends('layouts.master')

@section('title', 'File Storage')


@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>File Storage</h3>
        </div>
        <div class="col-md-6 offset-3 text-center">
            <h3>Upload a File</h3>
            <form class="row g-3 card bg-info" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="photo" onchange="previewFile(this);">
                </div>
                <button type="button" class="btn btn-primary btn-lg my-4" onclick="uploadPhoto()">Upload Photo</button>
            </form>
        </div>
        <div class="col-md-3 text-center">
            <img src="" class="img-thumbnail" id="photoPreview" alt="Photo Preview">
        </div>
        <div class="col-md-6 offset-3">
            <table class="table table-bordered" border="1">
                <thead>
                    <tr>
                        <th scope="col">SL.</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Photo</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($photos as $photo)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td><img src="{{ asset('storage/' . trim(str_replace('public/', '', $photo->name))) }}"
                                    class="img-thumbnail" alt="Image Not Available" width="50px"></td>
                            <td><button type="button" class="btn btn-info btn-lg"><a class="text-primary"
                                        href="{{ route('photos.show', $photo->id) }}">download</a></button></td>
                            <td>
                                <form class="d-inline" action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <th scope="row" colspan="2" class="text-danger">No Data Available To Display</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection


@section('javascripts')

    <script>
        const previewFile = () => {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#photoPreview").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }

        const uploadPhoto = () => {
            var _token = $('input[name="_token"]').val();
            var photo = $('#photo')[0].files;
            var fd = new FormData();
            fd.append('file', photo[0]);
            fd.append('_token', _token);
            $.ajax({
                url: "{{ route('photos.store') }}",
                method: "POST",
                data: fd,
                contentType: false,
                processData: false,
                datatype: "json",
                success: function(result) {
                    console.log(result);
                },
                beforeSend: function() {
                    //$('#loading').show();
                },
                complete: function() {
                    //$('#loading').hide();
                },
                error: function(error) {
                    alert(JSON.stringify(error))
                }
            });
        }
    </script>

@endsection
