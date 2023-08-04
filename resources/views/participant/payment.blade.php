@extends('layouts.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Payment</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if ($option == 'early' && $negara != 'Indonesia')
                        <h3 class="font-weight-bold">Early Bird Payment</h3>
                        <h3>$100</h3>
                    @elseif ($option == 'regular' && $negara != 'Indonesia')
                        <h3 class="font-weight-bold">Regular Payment</h3>
                        <h3>$105</h3>
                    @elseif ($option == 'early' && $negara == 'Indonesia')
                        <h3 class="font-weight-bold">Early Bird Payment</h3>
                        <h3>Rp 750.000</h3>
                    @else
                        <h3 class="font-weight-bold">Regular Payment</h3>
                        <h3>Rp 800.000</h3>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form enctype="multipart/form-data" action="/participant/payment/post/{{ $option }}"
                        method="post">
                        @csrf
                        <div class="input-group mb-3">

                            <div class="custom-file">

                                <input type="file" class="custom-file-input" id="file-upload" name="file"
                                    onchange="return fileValidation()" />
                                <label class="custom-file-label" for="inputGroupFile02"
                                    aria-describedby="inputGroupFileAddon02">Payment Check</label>
                            </div>
                        </div>
                        <div id="file-upload-filename" class="mt-3 mb-3" style="display: block"><span id="status"></span>
                        </div>
                        <p class="text-muted">*Format file must be jpg / png / pdf </p>
                        <button type="submit" class="btn btn-primary">Next</button>
                    </form>
                </div>
            </div>
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
            var allowedExtensions = /(\.jpg|\.png|\.pdf)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert("Invalid file type");
                fileInput.value = "";
                return false;
            }
        }
    </script>
@endsection
