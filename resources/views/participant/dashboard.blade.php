@extends('layouts.layout')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Payment</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">

            <div class="row mt-4">
                <h3 class="font-weight-bold">Your Payment</h3>
                <div class="col-lg-12">
                    <table id="example" class="display table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Type</th>
                                <th>Date Upload</th>
                                <th>Status</th>
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
                                            {{ $item->jenis }}
                                        </td>
                                        <td>
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-success">Accepted</span>
                                            @elseif ($item->status == 0)
                                                <span class="badge badge-warning">Waiting for Confirmation</span>
                                            @elseif ($item->file_pembayaran == 2)
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-warning">Waiting for Confirmation</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a class="btn btn-primary"
                                                href="/participant/reupload/{{ $item->id_participant_payment }}">Reupload</a>
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
