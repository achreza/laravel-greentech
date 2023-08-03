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
                        <h1 class="m-0">Submission</h1>
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <div class="container">
            <form id="uploadForm" enctype="multipart/form-data"
                action="/payment/confirmation/{{ $submission->id_abs_submission }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="participantType">Participant Type:</label>
                    <select id="participantType" onchange="handleParticipantTypeChange()" class="form-control">
                        <option value="">-- Select Participant Type --</option>
                        <option value="online">Online</option>
                        <option value="onsite">Onsite</option>
                    </select>
                </div>

                <div class="form-group">
                    <div id="earlyBirdSection" style="display: none;">
                        <label for="earlyBirdType">Type:</label>
                        <select id="earlyBirdType" onchange="handleEarlyBirdTypeChange()" class="form-control">
                            <option value="">-- Select Early Bird Type --</option>
                            <option value="earlyBird">Early Bird</option>
                            <option value="regular">Regular</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div id="onlineEarlyLocationSection" style="display: none;">
                        <label for="onlineEarlyLocationType">Type:</label>
                        <select id="onlineEarlyLocationType" class="form-control" name="onlineEarly">
                            <option value="">-- Select Location Type --</option>
                            <option value="onlineEarlyLocal">Local</option>
                            <option value="onlineEarlyInternational">International</option>


                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div id="onlineRegularLocationSection" style="display: none;">
                        <label for="onlineRegularLocationType">Type:</label>
                        <select id="onlineRegularLocationType" class="form-control" name="onlineRegular">
                            <option value="">-- Select Location Type --</option>
                            <option value="onlineRegularLocal">Local</option>
                            <option value="onlineRegularInternational">International</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div id="onsiteEarlyLocationSection" style="display: none;">
                        <label for="onsiteEarlyLocationType">Type:</label>
                        <select id="onsiteEarlyLocationType" class="form-control" name="onsiteEarly">
                            <option value="">-- Select Location Type --</option>
                            <option value="onsiteEarlyLocal">Local</option>
                            <option value="onsiteEarlyInternational">International</option>
                            <option value="onsiteEarlyUndergraduate">Undergraduate</option>
                            <option value="onsiteEarlyPostgraduate">Master or Doctor</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div id="onsiteRegularLocationSection" style="display: none;">
                        <label for="onsiteRegularLocationType">Type:</label>
                        <select id="onsiteRegularLocationType" class="form-control" name="onsiteRegular">
                            <option value="">-- Select Location Type --</option>
                            <option value="onsiteRegularLocal">Local</option>
                            <option value="onsiteRegularInternational">International</option>
                            <option value="onsiteRegularUndergraduate">Undergraduate</option>
                            <option value="onsiteRegularPostgraduate">Master or Doctor</option>

                        </select>
                    </div>
                </div>








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
        function handleParticipantTypeChange() {
            var participantType = document.getElementById("participantType").value;
            var earlyBirdSection = document.getElementById("earlyBirdSection");
            var earlyBirdTypeDropdown = document.getElementById("earlyBirdType");
            var onlineEarlyLocationTypeDropdown = document.getElementById("onlineEarlyLocationType");
            var onlineRegularLocationTypeDropdown = document.getElementById("onlineRegularLocationType");
            var onsiteEarlyLocationTypeDropdown = document.getElementById("onsiteEarlyLocationType");
            var onsiteRegularLocationTypeDropdown = document.getElementById("onsiteRegularLocationType");

            // Sembunyikan semua bagian terlebih dahulu
            earlyBirdSection.style.display = "none";

            // Setel nilai earlyBirdTypeDropdown menjadi indeks opsi pertama (pilihan kosong)
            earlyBirdTypeDropdown.selectedIndex = 0;

            onlineEarlyLocationTypeDropdown.selectedIndex = 0;
            onlineRegularLocationTypeDropdown.selectedIndex = 0;
            onsiteEarlyLocationTypeDropdown.selectedIndex = 0;
            onsiteRegularLocationTypeDropdown.selectedIndex = 0;

            if (participantType === "online") {
                earlyBirdSection.style.display = "block";
            } else if (participantType === "onsite") {
                earlyBirdSection.style.display = "block";
            }
        }


        function handleEarlyBirdTypeChange() {
            var earlyBirdType = document.getElementById("earlyBirdType").value;
            var participantType = document.getElementById("participantType").value;
            var onlineEarlyLocationSection = document.getElementById("onlineEarlyLocationSection");
            var onlineRegularLocationSection = document.getElementById("onlineRegularLocationSection");
            var onsiteEarlyLocationSection = document.getElementById("onsiteEarlyLocationSection");
            var onsiteRegularLocationSection = document.getElementById("onsiteRegularLocationSection");
            var onlineEarlyLocationTypeDropdown = document.getElementById("onlineEarlyLocationType");
            var onlineRegularLocationTypeDropdown = document.getElementById("onlineRegularLocationType");
            var onsiteEarlyLocationTypeDropdown = document.getElementById("onsiteEarlyLocationType");
            var onsiteRegularLocationTypeDropdown = document.getElementById("onsiteRegularLocationType");

            // Sembunyikan semua bagian terlebih dahulu
            onlineEarlyLocationSection.style.display = "none";
            onlineRegularLocationSection.style.display = "none";
            onsiteEarlyLocationSection.style.display = "none";
            onsiteRegularLocationSection.style.display = "none";

            // Setel nilai earlyBirdTypeDropdown menjadi indeks opsi pertama (pilihan kosong)
            onlineEarlyLocationTypeDropdown.selectedIndex = 0;
            onlineRegularLocationTypeDropdown.selectedIndex = 0;
            onsiteEarlyLocationTypeDropdown.selectedIndex = 0;
            onsiteRegularLocationTypeDropdown.selectedIndex = 0;

            if (participantType === "online" && earlyBirdType === "earlyBird") {
                onlineEarlyLocationSection.style.display = "block";
            } else if (participantType === "online" && earlyBirdType === "regular") {
                onlineRegularLocationSection.style.display = "block";
            } else if (participantType === "onsite" && earlyBirdType === "earlyBird") {
                onsiteEarlyLocationSection.style.display = "block";
            } else if (participantType === "onsite" && earlyBirdType === "regular") {
                onsiteRegularLocationSection.style.display = "block";
            }
        }
    </script>

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
