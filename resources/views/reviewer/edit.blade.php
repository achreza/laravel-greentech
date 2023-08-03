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
            <form action="/reviewer/make-decision/{{ $submission->id_abs_submission }}" method="post">
                @csrf
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
                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>

                    <select class="form-control" name="status" id="" name="status"
                        @if ($submission->id_status_abs != 1) disabled @endif>
                        <option value="1" @if ($submission->id_status_abs == 1) selected @endif>In Review</option>
                        <option value="2" @if ($submission->id_status_abs == 2) selected @endif>Accepted</option>
                        <option value="3" @if ($submission->id_status_abs == 3) selected @endif>Rejected</option>
                    </select>

                </div>
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
                        @if ($submission->id_status_abs == 2 || $submission->id_status_abs == 3) readonly @else required @endif> {{ $submission->comment }}</textarea>

                </div>

                @if ($submission->id_status_abs == 1)
                    <button type="submit" class="btn btn-primary edit"
                        onClick="return confirm('Anda yakin ingin mengubah?')">Make
                        Decision</button>
                @else
                    <small id="decisionHelp" class="form-text text-muted">Submission ini Sudah tidak dalam status "IN
                        REVIEW"</small>
                @endif

            </form>
        </div>
    </div>
@endsection
