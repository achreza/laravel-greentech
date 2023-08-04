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
                        <h1 class="m-0">Detail</h1>
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
                        <h4>Submitted By :</h4>
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
                        <h4>Title :</h4>
                    </td>
                    <td>
                        <p>{{ $submission->judul }}</p>
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
                        <h4>Abstract :</h4>
                    </td>
                    <td>
                        <p style="width: 700px;text-align: justify;">{{ $submission->abstrak }}</p>
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
                        <h4>Upload Time :</h4>
                    </td>
                    <td>
                        <p><span>{{ $submission->submitted_at }}</span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Decision Time :</h4>
                    </td>
                    <td>
                        <p><span>
                                @if ($submission->decission_at)
                                    {{ $submission->decission_at }}
                                @else
                                    {{ '-' }}
                                @endif
                            </span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Decision By :</h4>
                    </td>
                    <td>
                        <p><span>
                                @if ($reviewer)
                                    {{ $reviewer->nama }}
                                @else
                                    {{ '-' }}
                                @endif
                            </span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Comment :</h4>
                    </td>
                    <td>
                        <p>{{ $submission->comment }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Conference Type :</h4>
                    </td>
                    <td>
                        <p><span>
                                @if ($submission->type_conference)
                                    {{ $submission->type_conference }}
                                @else
                                    {{ 'Not selected yet' }}
                                @endif
                            </span></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Payment :</h4>
                    </td>
                    <td>
                        @if ($submission->file_pembayaran !== null && $submission->status_bayar == 1)
                            <span class="badge badge-success">Paid</span>
                        @elseif ($submission->file_pembayaran !== null && $submission->status_bayar == 0)
                            <span class="badge badge-warning">Waiting for Confirmation</span>
                        @elseif ($submission->file_pembayaran !== null && $submission->status_bayar == 2)
                            <span class="badge badge-danger">Rejected</span>
                        @else
                            <span class="badge badge-secondary">Unpaid</span>
                        @endif
                    </td>
                </tr>

            </table>
            <div class="file-section mt-4">
                @if ($submission->file_pembayaran != null && $submission->user->student_card != null)
                    <div class="input-group mb-2">
                        <a href="/admin/download/payment/{{ $submission->file_pembayaran }}"><button type="button"
                                class="btn btn-primary" id="inputGroupFileAddon02">
                                {{ $submission->file_pembayaran }}
                            </button></a>
                        <label class="input-group-text" for="inputGroupFile02">Payment File</label>
                    </div>

                    <div class="input-group mb-2">
                        <a href="/admin/download/student_card/{{ $submission->user->student_card }}"><button type="button"
                                class="btn btn-primary" id="inputGroupFileAddon02">
                                {{ $submission->user->student_card }}
                            </button></a>
                        <label class="input-group-text" for="inputGroupFile02">Student Card</label>
                    </div>
                @elseif($submission->file_pembayaran != null && $submission->user->student_card == null)
                    <div class="input-group mb-2">
                        <a href="/download/payment/{{ $submission->file_pembayaran }}"><button type="button"
                                class="btn btn-primary" id="inputGroupFileAddon02">
                                {{ $submission->file_pembayaran }}
                            </button></a>
                        <label class="input-group-text" for="inputGroupFile02">Payment File</label>
                    </div>
                @else
                    <div class=""></div>
                @endif
            </div>









        </div>
    </div>
@endsection
