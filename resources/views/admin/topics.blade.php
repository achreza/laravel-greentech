@extends('layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Topics</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <div class="row">
                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add
                    Topic</button>
                <div class="col-lg-12">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Topic</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        {{ $item->loop }}
                                    </td>
                                    <td>
                                        {{ $item->nama_topic }}
                                    </td>
                                    <td>
                                        <form action=""></form>
                                        <a class="btn btn-danger delete" data-confirm="Anda yakin ingin menghapus ini?"
                                            href="/admin/topic/remove/{{ $item->id_topic }}">Delete</a>

                                    </td>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

            <div class=" modal" id="exampleModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Topic</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/topic/add" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Topic</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="topic">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>

                    </div>
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
