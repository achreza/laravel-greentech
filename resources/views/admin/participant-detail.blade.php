@extends('layouts.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <form action="/admin/participant/decision/{{ $data->id_participant_payment }}" method="post">
                        @csrf
                        <h3>Name : {{ $data->user->nama }}</h3>
                        <h3>Conference Type : {{ $data->jenis }}</h3>
                        <h3>Date : {{ $data->created_at }}</h3>
                        <div class="input-group mb-3">

                            <a href="/admin/participant/download/{{ $data->file_pembayaran }}"><button type="button"
                                    class="btn btn-primary" id="inputGroupFileAddon02">
                                    {{ $data->file_pembayaran }}
                                </button></a>
                            <label class="input-group-text" for="inputGroupFile02">Payment File</label>

                        </div>
                        <div id="file-upload-filename" class="mt-3 mb-3" style="display: block"><span id="status"></span>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>

                            <select class="form-control" name="status" id=""
                                @if ($data->status == 1) disabled @endif>
                                <option value="1" @if ($data->status == 1) selected @endif>Accept</option>
                                <option value="2" @if ($data->status == 2) selected @endif>Reject</option>
                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
