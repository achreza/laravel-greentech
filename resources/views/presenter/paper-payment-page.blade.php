@extends('layouts.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Paper Payment</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <form enctype="multipart/form-data" action="/paper/payment/post/{{ $data->id_paper }}" method="post">
                @csrf
                <div class=" mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file"
                            onchange="return fileValidation()">
                        <label class="custom-file-label" for="customFile">File Payment</label>
                    </div>

                </div>

                <div id="file-upload-filename" class="mt-3 mb-3" style="display: block"><span id="status"></span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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
