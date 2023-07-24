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
            <form action="/admin/detail/edit/{{ $submission->id_abs_submission }}" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Topics</label>
                    <select class="form-control" name="topic" disabled>
                        @foreach ($topics as $topic)
                            <option value="{{ $topic->id_topic }}" @if ($topic->id_topic == $submission->id_topic) selected @endif>
                                {{ $topic->nama_topic }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="judul" value="{{ $submission->judul }}" readonly />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Abstract</label>
                    <textarea class="form-control" name="abstrak" rows="6" cols="50" style="resize: none" readonly>{{ $submission->abstrak }} </textarea>
                </div>
                <div class="input-group mb-3">

                    <a href="/download/{{ $submission->file_abs }}"><button type="button" class="btn btn-primary"
                            id="inputGroupFileAddon02">
                            {{ $submission->file_abs }}
                        </button></a>
                    <label class="input-group-text" for="inputGroupFile02">Submission File</label>

                </div>
                <h5>Upload Time : <span>
                        {{ $submission->submitted_at }}
                    </span></h5>

                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>

                    <select class="form-control" name="" id="" name="status" {{-- @if ($submission->id_status_abs != 1) disabled @endif> --}}disabled>
                        <option value="1" @if ($submission->id_status_abs == 1) selected @endif>In Review</option>
                        <option value="2" @if ($submission->id_status_abs == 2) selected @endif>Accepted</option>
                        <option value="3" @if ($submission->id_status_abs == 3) selected @endif>Rejected</option>
                    </select>

                </div>
                <h5>Decision Time : <span>
                        {{ $submission->decission_at || '-' }}
                    </span></h5>
                <div class="form-group">
                    <label for="exampleInputEmail1">Reviewer</label>
                    <select class="form-control" name="reviewer" disabled>
                        @foreach ($reviewer as $item)
                            <option value="{{ $item->id_user }}" @if ($item->id_user == $submission->decission_by) selected @endif>
                                {{ $item->nama }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Comment</label>
                    <textarea class="form-control" id="w3review" name="comment" rows="6" cols="50" style="resize: none"
                        disabled>{{ $submission->comment }}</textarea>

                </div>
            </form>
        </div>
    </div>
@endsection
