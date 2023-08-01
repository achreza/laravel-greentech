@extends('layouts.layout')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <form action="/admin/presenter/decision/{{ $data->id }}" method="post">
                    @csrf
                    <h3>{{ $data->id_presenter->nama }}</h3>
                    <h3>{{ $data->jenis }}</h3>
                    <h3>{{ $data->created_at }}</h3>
                    <div class="input-group mb-3">

                        <a href="/download/{{ $data->file_pembayaran }}"><button type="button" class="btn btn-primary"
                                id="inputGroupFileAddon02">
                                {{ $data->file_pembayaran }}
                            </button></a>
                        <label class="input-group-text" for="inputGroupFile02">Payment File</label>

                    </div>
                    <div id="file-upload-filename" class="mt-3 mb-3" style="display: block"><span id="status"></span>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
