@extends('layouts.master')

@section('title', 'File Storage')

@push('style')
    <style>
        .card-img-top {
            width: 100%;
            height: 30vh;
            object-fit: cover;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>File Storage</h3>
            <p>UploadPhoto2 is for Trait use</p>
        </div>
        <div class="col-md-6 offset-1 text-center  my-3">
            <form class="row g-3 card bg-info" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label"><h3>Upload a File</h3></label>
                    <input class="form-control" type="file" id="photo" onchange="previewFile(this);">
                </div>
                <div class="d-flex">
                    <button type="button" class="btn btn-secondary btn-md my-4 mx-5" onclick="uploadPhoto()">Upload Photo</button>
                    <button type="button" class="btn btn-success btn-md my-4 mx-5" onclick="uploadPhoto2()">Upload Photo 2</button>
                </div>
            </form>
        </div>
        <div class="col-md-3 text-center my-3">
            <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" id="photoPreview" alt="Photo Preview">
              </div>
        </div>
        @forelse ($photos as $photo)
            <div class="col-md-3">
                <div class="card " >
                    <img src="{{ asset('storage/' . trim(str_replace('public/', '', $photo->name))) }}" class="card-img-top"
                        alt="...">
                    <div class="card-body bg-warning">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                        <a href="{{ route('photos.show', $photo->id) }}" class="btn btn-primary mx-3">download</a>
                        <form class="d-inline" action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <tr class="text-center">
                <th scope="row" colspan="2" class="text-danger">No Data Available To Display</th>
            </tr>
        @endforelse
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
            fd.append('photo', photo[0]);
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


        const uploadPhoto2 = () => {
            var _token = $('input[name="_token"]').val();
            var photo = $('#photo')[0].files;
            var fd = new FormData();
            fd.append('photo', photo[0]);
            fd.append('_token', _token);
            $.ajax({
                url: "{{ route('photo.store2') }}",
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
