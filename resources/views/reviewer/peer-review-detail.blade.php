@extends('layouts.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Paper Submission</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">

            <div class="row mt-4">
                <h3 class="font-weight-bold">Paper</h3>
                <div class="col-lg-12">
                    <table id="example" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>Revision Number</th>
                                <th>Your Paper</th>
                                <th>Revision from Reviewer</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data)
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <div class="input-group mb-2">
                                                <a href="/download/paper-presenter/{{ $item->file_origin }}"><button
                                                        type="button" class="btn btn-primary" id="inputGroupFileAddon02">
                                                        {{ $item->file_origin }}
                                                    </button></a>
                                                <label class="input-group-text" for="inputGroupFile02">Payment File</label>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($item->file_revision != null)
                                                <div class="input-group mb-2">
                                                    <a href="/download/paper-reviewer/{{ $item->file_revision }}"><button
                                                            type="button" class="btn btn-primary"
                                                            id="inputGroupFileAddon02">
                                                            {{ $item->file_revision }}
                                                        </button></a>
                                                    <label class="input-group-text" for="inputGroupFile02">Payment
                                                        File</label>
                                                </div>
                                            @else
                                                <div class="">-</div>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->comment }}

                                        </td>

                                        <td>
                                            <a class="btn btn-primary"
                                                href="/reviewer/peer-review/edit/{{ $item->id_peer_reviews }}">
                                                Send Revision</a>
                                        </td>



                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No Data</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        var deleteLinks = document.querySelectorAll('.delete');
        for (var i = 0; i < deleteLinks.length; i++) {
            deleteLinks[i].addEventListener('click', function(event) {
                event.preventDefault();

                var choice = confirm(this.getAttribute('data-confirm'));

                if (choice) {
                    window.location.href = this.getAttribute('href');
                }

            });
        }
    </script>
@endsection
