@extends('layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users List</h1>
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
                                        {{ $totalAdmin }}
                                    </h4>
                                    <h6 class="text-muted m-b-0">Admin</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-yellow">
                            <div class="row align-items-center">
                                <div class="col-9">

                                </div>
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
                                        {{ $totalReviewer }}
                                    </h4>
                                    <h6 class="text-muted m-b-0">Reviewer</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-green">
                            <div class="row align-items-center">
                                <div class="col-9">

                                </div>
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
                                        {{ $totalPresenter }}
                                    </h4>
                                    <h6 class="text-muted m-b-0">Presenter</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-blue">
                            <div class="row align-items-center">
                                <div class="col-9">

                                </div>
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
                                        {{ $totalParticipant }}
                                    </h4>
                                    <h6 class="text-muted m-b-0">Participant</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-bar-chart f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-red">
                            <div class="row align-items-center">
                                <div class="col-9">

                                </div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add
                User</button>
            <div class="row mt-4">
                <h3 class="font-weight-bold">User List</h3>
                <div class="col-lg-12">
                    <table class="table" id="table-data">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">User Role</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->id_role_user }}</td>
                                    <td>
                                        <a class="btn btn-danger delete" data-confirm="Anda yakin ingin menghapus ini?"
                                            href="/admin/user-list/remove/{{ $item->id_user }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/user-list/add" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email" />
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="name" />
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="phone" />
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Institution</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="institution" />
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Country</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="country" />
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gender</label>
                            <select class="form-control" name="gender">

                                <option value="male">
                                    Male
                                </option>
                                <option value="female">
                                    Female
                                </option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="form-control" name="category">

                                <option value="2">Presnter</option>
                                <option value="3">Participant</option>

                            </select>
                        </div>



                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table-data').DataTable();
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
