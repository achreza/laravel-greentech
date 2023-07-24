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
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-md-12">
                    <div class="card">
                        <div class="card-block p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-yellow font-weight-bold">
                                        {{ $all }}
                                    </h4>
                                    <h6 class="text-muted m-b-0">All Submissions</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-yellow">
                            <div class="row align-items-center">
                                <div class="col-9"></div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-12">
                    <div class="card">
                        <div class="card-block p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-green font-weight-bold">
                                        {{ $accept }}
                                    </h4>
                                    <h6 class="text-muted m-b-0">Submission Accepted</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-green">
                            <div class="row align-items-center">
                                <div class="col-9"></div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-12">
                    <div class="card">
                        <div class="card-block p-3">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-red font-weight-bold">
                                        <span id="result"></span>

                                        {{ $reject }}

                                    </h4>
                                    <h6 class="text-muted m-b-0">Submission Rejected</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-red">
                            <div class="row align-items-center">
                                <div class="col-9"></div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            @if ($submissionAllData)
                                @foreach ($submissionAllData as $item)
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
                                            @if ($item->file_pembayaran !== null && $item->status_bayar == 1)
                                                <span class="badge badge-success">Paid</span>
                                            @elseif ($item->file_pembayaran !== null && $item->status_bayar == 0)
                                                <span class="badge badge-warning">Waiting for Confirmation</span>
                                            @elseif ($item->file_pembayaran == 2)
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-secondary">Unpaid</span>
                                            @endif
                                        </td>
                                        @if (request()->session()->get('user.id_role_user') == 1)
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="/admin/detail/{{ $item->id_abs_submission }}">Detail</a>
                                                <span> | </span>
                                                <a class="btn btn-danger delete"
                                                    data-confirm="Anda yakin ingin menghapus ini?"
                                                    href="/admin/dashboard/remove/{{ $item->id_abs_submission }}">Delete</a>
                                            </td>
                                        @elseif(request()->session()->get('user.id_role_user') == 4)
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="/reviewer/detail/{{ $item->id_abs_submission }}">Detail</a>


                                            </td>
                                        @else
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="/detail/{{ $item->id_abs_submission }}">Detail</a>
                                                <span> | </span>
                                                <a class="btn btn-danger delete"
                                                    data-confirm="Anda yakin ingin menghapus ini?"
                                                    href="/detail/remove/{{ $item->id_abs_submission }}">Delete</a>
                                        @endif
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
