@extends('layouts.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Revision</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <form enctype="multipart/form-data" action="/reviewer/peer-review/post/{{ $data->id_peer_reviews }}"
                method="post">
                @csrf
                <div class=" mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file">
                        <label class="custom-file-label" for="customFile">File Revision</label>
                    </div>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Comment</label>
                    <textarea class="form-control" id="w3review" name="comment" rows="6" cols="50" style="resize: none"
                        required> </textarea>

                </div>
                <div id="file-upload-filename" class="mt-3 mb-3" style="display: block"><span id="status"></span>
                </div>
                <button type="submit" class="btn btn-primary">Next</button>
            </form>

        </div>
    </div>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
