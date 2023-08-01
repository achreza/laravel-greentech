@extends('layouts.layout')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">

            <div class="row mt-4">
                <h3 class="font-weight-bold">Your submitted Abstract</h3>
                <div class="col-lg-12">
                    <table id="example" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Article</th>
                                <th>Topic</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Status Payment</th>
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
                                            {{ $item->id_abs_submission }}
                                        </td>
                                        <td>
                                            {{ $item->topic->nama_topic }}
                                        </td>
                                        <td>
                                            {{ $item->judul }}
                                        </td>
                                        <td>
                                            {{ $item->status->status }}
                                        </td>
                                        <td>
                                            <span class="badge badge-success">Paid</span>
                                        </td>

                                        <td>
                                            <a class="btn btn-primary" href="/paper/{{ $item->id_abs_submission }}">Upload
                                                Full Paper</a>

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
