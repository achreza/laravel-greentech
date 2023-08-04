@extends('layouts.layout')

@section('content')
    <style>
        /* CSS for the table layout */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        /* CSS for the form elements */
        h4 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        p {
            margin: 0;
        }

        /* CSS for the buttons */
        .btn {
            margin-top: 10px;
        }

        /* CSS for the status badges */
        .badge {
            padding: 5px 8px;
            border-radius: 4px;
        }

        /* CSS for the success badge */
        .badge-success {
            background-color: #28a745;
            color: #fff;
        }

        /* CSS for the warning badge */
        .badge-warning {
            background-color: #ffc107;
            color: #000;
        }

        /* CSS for the danger badge */
        .badge-danger {
            background-color: #dc3545;
            color: #fff;
        }

        /* CSS for the secondary badge */
        .badge-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        /* CSS for the buttons inside the input group */
        .input-group-btn button {
            border-radius: 0;
        }

        /* CSS for the table cells containing buttons */
        td button {
            width: 100%;
        }

        /* CSS for the links inside the buttons */
        a.btn-link {
            text-decoration: none;
            color: #fff;
        }

        /* CSS for the links inside the buttons on hover */
        a.btn-link:hover {
            color: #fff;
        }

        /* Optional: Add more styles to adjust according to your design */
    </style>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Submission</h1>
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <div class="container">

            <table>
                <tr>
                    <td>
                        <h4>Submitter :</h4>
                    </td>
                    <td>
                        <p>{{ $submission->user->nama }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Country : </h4>
                    </td>
                    <td>
                        <p>{{ $submission->user->negara }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Topic :</h4>
                    </td>
                    <td>
                        <p>{{ $submission->topic->nama_topic }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Title :</h4>
                    </td>
                    <td>
                        <p>{{ $submission->judul }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Abstract :</h4>
                    </td>
                    <td>
                        <p style="width: 700px;text-align: justify;">{{ $submission->abstrak }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>File :</h4>
                    </td>
                    <td>

                        <div class="input-group mb-3">
                            <a href="/download/{{ $submission->file_abs }}">
                                <button type="button" class="btn btn-primary" id="inputGroupFileAddon02">
                                    {{ $submission->file_abs }}
                                </button>
                            </a>
                            <label class="input-group-text" for="inputGroupFile02">Submission File</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Upload Time :</h4>
                    </td>
                    <td>
                        <p><span>{{ $submission->submitted_at }}</span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Status :</h4>
                    </td>
                    <td>
                        <p>{{ $submission->status->status }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Decision Time :</h4>
                    </td>
                    <td>
                        <p>
                            <span>
                                @if ($submission->decission_at)
                                    {{ $submission->decission_at }}
                                @else
                                    {{ '-' }}
                                @endif
                            </span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Comment :</h4>
                    </td>
                    <td>
                        <p style="width: 700px;text-align: justify;">{{ $submission->comment }}</p>
                    </td>
                </tr>
            </table>




        </div>
    </div>
@endsection
