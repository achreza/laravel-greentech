@extends('layouts.layout')
@section('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $("#uploadForm").submit(function() {
                $("#status").empty().text("File is uploading...");

                $(this).ajaxSubmit({
                    error: function(xhr) {
                        status("Error: " + xhr.status);
                    },
                    success: function(response) {
                        console.log(response);
                        $("#status").empty().text(response);
                    },
                });
                return false;
            });
        });
    </script> -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Submission Payment</h1>
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <div class="container">
            <form id="uploadForm" enctype="multipart/form-data" action="/payment/post_payment" method="post">
                @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">Your Title</label>
                    <select class="form-control" name="submission">
                        @foreach ($submission as $item)
                            <option value="{{ $item->id_abs_submission }}">{{ $item->judul }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">

                    <div class="custom-file">

                        <input type="file" class="custom-file-input" id="file-upload" name="file"
                            onchange="return fileValidation()" />
                        <label class="custom-file-label" for="inputGroupFile02"
                            aria-describedby="inputGroupFileAddon02">Payment Check</label>
                    </div>
                </div>
                <div id="file-upload-filename" class="mt-3 mb-3" style="display: block"><span id="status"></span></div>

                <button type="submit" class="btn btn-primary">Submit</button>

                {{-- @if ($submission_status == 1)
                    <button type="submit" class="btn btn-primary">Submit</button>
                @else
                    <button type="submit" class="btn btn-danger" disabled>System Pengumpulan Sudah Ditutup</button>
                @endif --}}


            </form>
        </div>
    </div>

    <script>
        var input = document.getElementById("file-upload");
        var infoArea = document.getElementById("file-upload-filename");

        input.addEventListener("change", showFileName);

        function showFileName(event) {
            // the change event gives us the input it occurred in
            var input = event.srcElement;

            // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
            var fileName = input.files[0].name;

            // use fileName however fits your app best, i.e. add it into a div
            infoArea.textContent = "File name: " + fileName;
        }

        function fileValidation() {
            var fileInput = document.getElementById("file-upload");

            var filePath = fileInput.value;

            // Allowing file type
            var allowedExtensions = /(\.doc|\.docx)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert("Invalid file type");
                fileInput.value = "";
                return false;
            }
        }
    </script>
@endsection
