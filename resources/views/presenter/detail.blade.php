@extends('layouts.layout')

@section('content')
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

            <h4>Topic : {{ $submission->topic->nama_topic }}</h4>
            <h4>Title : {{ $submission->judul }}</h4>
            <h4>Abstract : </h4>
            <p>{{ $submission->abstrak }}</p>

            <div class="input-group mb-3">

                <a href="/download/{{ $submission->file_abs }}"><button type="button" class="btn btn-primary"
                        id="inputGroupFileAddon02">
                        {{ $submission->file_abs }}
                    </button></a>
                <label class="input-group-text" for="inputGroupFile02">Submission File</label>

            </div>
            <h4>Upload Time : <span>

                    {{ $submission->submitted_at }}
                </span></h4>
            <h4>Status : {{ $submission->status->status }}</h4>
            <h4>Decision Time : <span>
                    @if ($submission->decission_at)
                        {{ $submission->decission_at }}
                    @else
                        {{ '-' }}
                    @endif
                </span></h4>

            <div class="form-group">
                <label for="exampleInputEmail1">Comment</label>
                <textarea class="form-control" id="w3review" name="comment" rows="6" cols="50" style="resize: none"
                    readonly> {{ $submission->comment }}</textarea>

            </div>
            @if ($submission->file_pembayaran !== null && $submission->status_bayar == 1)
                <h4>Payment Status : </h4> <span class="badge badge-success">Paid</span>
            @elseif ($submission->file_pembayaran !== null && $submission->status_bayar == 0)
                <h4>Payment Status : </h4><span class="badge badge-warning">Waiting for Confirmation</span>
            @elseif ($submission->file_pembayaran !== null && $submission->status_bayar == 2)
                <h4>Payment Status : </h4><span class="badge badge-danger">Rejected</span>
            @else
                <h4>Payment Status : </h4><span class="badge badge-secondary">Unpaid</span>
            @endif

        </div>
    </div>
@endsection
