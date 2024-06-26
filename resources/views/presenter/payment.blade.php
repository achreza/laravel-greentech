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
                                <th>Title</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>File</th>
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
                                            {{ $item->judul }}
                                        </td>
                                        <td>
                                            {{ $item->status->status }}
                                        </td>
                                        <td>
                                            @if ($item->file_pembayaran !== null && $item->status_bayar == 1)
                                                <span class="badge badge-success">Paid</span>
                                            @elseif ($item->file_pembayaran !== null && $item->status_bayar == 0)
                                                <span class="badge badge-warning">Waiting for Confirmation</span>
                                            @elseif ($item->file_pembayaran !== null && $item->status_bayar == 2)
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-secondary">Unpaid</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->file_pembayaran !== null)
                                                <div class="input-group mb-2">
                                                    <a href="/download/payment/{{ $item->file_pembayaran }}"><button
                                                            type="button" class="btn btn-primary"
                                                            id="inputGroupFileAddon02">
                                                            {{ $item->file_pembayaran }}
                                                        </button></a>
                                                    <label class="input-group-text" for="inputGroupFile02">Payment
                                                        File</label>
                                                </div>
                                            @else
                                                <div class="">-</div>
                                            @endif
                                        </td>


                                        <td>
                                            @if ($item->file_pembayaran == null && $item->status_bayar == null)
                                                <a class="btn btn-primary"
                                                    href="/payment/{{ $item->id_abs_submission }}">Payment</a>
                                            @elseif($item->file_pembayaran != null && $item->status_bayar == 2)
                                                <a class="btn btn-danger"
                                                    href="/payment/reupload{{ $item->id_abs_submission }}">Reupload</a>
                                            @endif
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
