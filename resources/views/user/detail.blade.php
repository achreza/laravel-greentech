@extends('layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Submission</h1>
                    </div><!-- /.col -->
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <form id="uploadForm" enctype="multipart/form-data" action="/detail/edit/{{ $data->id_abs_submission }}"
                method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Topics</label>
                    <select class="form-control" name="topic" @if ($data->id_status_abs == 2 || $data->id_status_abs == 3) disabled @endif>
                        @foreach ($topics as $topic)
                            <option value="{{ $topic->id_topic }}" @if ($topic->id_topic == $data->id_topic) selected @endif>
                                {{ $topic->nama_topic }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="judul" value="{{ $data->judul }}" @if ($data->id_status_abs == 2 || $data->id_status_abs == 3) disabled @endif />


                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Abstract</label>
                    <textarea class="form-control" id="w3review" name="abstrak" rows="6" cols="50" style="resize: none"
                        @if ($data->id_status_abs == 2 || $data->id_status_abs == 3) disabled @endif> {{ $data->abstrak }}</textarea>

                </div>
                <div class="input-group mb-1">
                    <a href="/download/{{ $data->file_abs }}"><button type="button" class="btn btn-primary"
                            id="inputGroupFileAddon02">
                            {{ $data->file_abs }}
                        </button></a>
                    <label class="input-group-text" for="inputGroupFile02">Submission File</label>

                </div>
                <span class="m-1 mb-1">Atau perbaharui file:</span>
                <div class="input-group mb-3 mt-1">
                    <div class="custom-file" @if ($data->id_status_abs == 2 || $data->id_status_abs == 3) hidden @endif>
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="file" />
                        <label class="custom-file-label" for="inputGroupFile02"
                            aria-describedby="inputGroupFileAddon02">Choose
                            file</label>
                    </div>
                </div>
                <h5>Upload Time : {{ $data->submitted_at }}
                </h5>
                <h5>Status : {{ $data->status->status }}
                </h5>

                <h5>Decision Time : @if ($data->decission_at)
                        {{ $data->decision_at }}
                    @else
                        -
                    @endif
                </h5>

                <div class="form-group">
                    <label for="exampleInputEmail1">Comment</label>
                    <textarea class="form-control" id="w3review" name="comment" rows="6" cols="50" style="resize: none"
                        readonly>{{ $data->comment }}</textarea>

                </div>
                @if ($data->id_status_abs == 1)
                    <button type="submit" class="btn btn-primary "
                        onClick="return confirm('Anda yakin ingin mengubah?')">Edit
                        my
                        Submission</button>
                @else
                    <button class="btn btn-danger" disabled>Your Abstract has been Reviewed</button>
                @endif

            </form>
        </div>

    </div>
@endsection
