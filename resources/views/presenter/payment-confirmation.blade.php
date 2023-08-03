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
                        <h1 class="m-0">Payment</h1>
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <div class="container">
            <form id="uploadForm" enctype="multipart/form-data" action="/payment/post_payment/{{ $id }}"
                method="post">
                @csrf
                @if ($type == 'student')
                    <h1>{{ $type }}</h1>
                    <h1>{{ $price }}</h1>

                    <input type="text" value="{{ $conference }}" name="conference" hidden>

                    <div class=" mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="student_card">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                    </div>
                    <div class=" mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input v2" id="customFile" name="file">
                            <label class="custom-file-label v22" for="customFile">Choose file</label>
                        </div>

                    </div>
                @else
                    <h1>{{ $type }}</h1>
                    <h1>{{ $price }}</h1>

                    <input type="text" value="{{ $conference }}" name="conference" hidden>

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file-upload" name="file"
                                onchange="return fileValidation()" />
                            <label class="custom-file-label" for="inputGroupFile02"
                                aria-describedby="inputGroupFileAddon02">Payment File</label>
                        </div>
                    </div>
                    <div id="file-upload-filename" class="mt-3 mb-3" style="display: block"><span id="status"></span>
                    </div>
                @endif


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
    </script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".v2").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".v22").addClass("selected").html(fileName);
        });
    </script>
    <script>
        var inputStudent = document.getElementById("file-upload-student");
        var infoAreaStudent = document.getElementById("file-upload-filename-student");
        var input = document.getElementById("file-upload");
        var infoArea = document.getElementById("file-upload-filename");

        input.addEventListener("change", showFileName);

        function showFileName(event) {
            var input = event.srcElement;
            var inputStudent = event.srcElement;
            var fileName = input.files[0].name;
            var studentName = inputStudent.files[0].name;
            infoArea.textContent = "File name: " + fileName;
            infoAreaStudent.textContent = "File name: " + studentName;
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

        function fileValidationStudent() {
            var fileInput = document.getElementById("file-upload-student");

            var filePath = fileInput.value;

            // Allowing file type
            var allowedExtensions = /(\.jpg|\.png)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert("Invalid file type");
                fileInput.value = "";
                return false;
            }
        }
    </script>
@endsection
