@extends('layouts.layout')

@section('content')
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
            <form action="/admin/detail/edit/{{ $submission->id_abs_submission }}" method="post">
                @csrf
                <h4>Submitter : {{ $submission->user->nama }}</h4>
                <h4>Title : {{ $submission->judul }}</h4>
                <h4>Topic : {{ $submission->topic->nama_topic }}</h4>
                <h4>Abtract : </h4>
                <p>{{ $submission->abstrak }}</p>
                <h4>Status : {{ $submission->status->status }}</h4>
                <h4>Upload Time : <span>

                        {{ $submission->submitted_at }}
                    </span></h4>
                <h4>Decision Time : <span>
                        @if ($submission->decission_at)
                            {{ $submission->decission_at }}
                        @else
                            {{ '-' }}
                        @endif
                    </span></h4>
                <h4>Decision By : <span>
                        @if ($reviewer)
                            {{ $reviewer->nama }}
                        @else
                            {{ '-' }}
                        @endif
                    </span></h4>
                <h4>Comment : </h4>
                <p>{{ $submission->comment }}</p>

                <h4>Conference Type : <span>
                        @if ($submission->type_conference)
                            {{ $submission->type_conference }}
                        @else
                            {{ 'Not selected yet' }}
                        @endif
                    </span></h4>

                <h4>Payment : @if ($submission->file_pembayaran !== null && $submission->status_bayar == 1)
                        <span class="badge badge-success">Paid</span>
                    @elseif ($submission->file_pembayaran !== null && $submission->status_bayar == 0)
                        <span class="badge badge-warning">Waiting for Confirmation</span>
                    @elseif ($submission->file_pembayaran !== null && $submission->status_bayar == 2)
                        <span class="badge badge-danger">Rejected</span>
                    @else
                        <span class="badge badge-secondary">Unpaid</span>
                    @endif
                </h4>

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


                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>

                        <select class="form-control" name="status" id=""
                            @if ($submission->status == '1') disabled @endif>
                            <option value="1" @if ($submission->status == '1') selected @endif>Accept</option>
                            <option value="2" @if ($submission->status == '2') selected @endif>Reject</option>
                        </select>

                    </div>
                @elseif($submission->file_pembayaran != null && $submission->user->student_card == null)
                    <div class="input-group mb-2">
                        <a href="/download/payment/{{ $submission->file_pembayaran }}"><button type="button"
                                class="btn btn-primary" id="inputGroupFileAddon02">
                                {{ $submission->file_pembayaran }}
                            </button></a>
                        <label class="input-group-text" for="inputGroupFile02">Payment File</label>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>

                        <select class="form-control" name="status" id=""
                            @if ($data->status == 1) disabled @endif>
                            <option value="1" @if ($data->status == 1) selected @endif>Accept</option>
                            <option value="2" @if ($data->status == 2) selected @endif>Reject</option>
                        </select>

                    </div>
                @else
                    <div class=""></div>
                @endif

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
