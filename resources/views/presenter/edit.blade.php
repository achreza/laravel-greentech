@extends('layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Submission</h1>
                    </div><!-- /.col -->
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <form id="uploadForm" enctype="multipart/form-data" action="/detail/edit/{{ $data->id_abs_submission }}"
                method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Topics</label>
                    <select class="form-control" name="topic" @if ($data->id_status_abs == 2 || $data->id_status_abs == 3) disabled @endif>
                        @foreach ($topics as $topic)
                            <option value="{{ $topic->id_topic }}" @if ($topic->id_topic == $data->id_topic) selected @endif>
                                {{ $topic->nama_topic }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="judul" value="{{ $data->judul }}" @if ($data->id_status_abs == 2 || $data->id_status_abs == 3) disabled @endif />


                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Abstract</label>
                    <textarea class="form-control" id="w3review" name="abstrak" rows="10" cols="50" style="resize: none"
                        @if ($data->id_status_abs == 2 || $data->id_status_abs == 3) disabled @endif> {{ $data->abstrak }}</textarea>

                </div>
                <div class="input-group mb-1">
                    <a href="/download/{{ $data->file_abs }}"><button type="button" class="btn btn-primary"
                            id="inputGroupFileAddon02">
                            {{ $data->file_abs }}
                        </button></a>
                    <label class="input-group-text" for="inputGroupFile02">Submission File</label>

                </div>


                <span class="m-1 mb-1">Reupload Submission:</span @if ($data->id_status_abs == 2 || $data->id_status_abs == 3)
                hidden
                @endif>
                <div class=" mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file"
                            onchange="return fileValidation()">
                        <label class="custom-file-label" for="customFile">File Revision</label>
                    </div>

                </div>

                <h5 style=" margin: 0;
            font-size: 18px;
            font-weight: bold;">Upload Time :
                    {{ $data->submitted_at }}
                </h5>
                <h5 style=" margin: 0;
            font-size: 18px;
            font-weight: bold;">Status :
                    {{ $data->status->status }}
                </h5>



                <div class="btn-section mt-4">
                    @if ($data->id_status_abs == 1)
                        <button type="submit" class="btn btn-primary "
                            onClick="return confirm('Anda yakin ingin mengubah?')">Edit
                            my
                            Submission</button>
                    @else
                        <button class="btn btn-danger" disabled>Your Abstract has been Reviewed</button>
                    @endif
                </div>


            </form>
        </div>

    </div>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        function fileValidation() {
            var fileInput = document.getElementById("file-upload");

            var filePath = fileInput.value;

            // Allowing file type
            var allowedExtensions = /(\.jpg|\.png|\.pdf)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert("Invalid file type");
                fileInput.value = "";
                return false;
            }
        }
    </script>
@endsection
