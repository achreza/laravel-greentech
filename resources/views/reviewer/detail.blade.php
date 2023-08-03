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

            <h4>Comment : </h4>
            <p>{{ $submission->comment }}</p>



        </div>
    </div>
@endsection
