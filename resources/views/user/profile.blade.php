@extends('layouts.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Settings</h1>
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <div class="container">
            <form action="/profile/update-profile/" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ $data->email }}" readonly />
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input name="userName" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ $data->nama }}" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input value="{{ $data->no_telp }}" type="number" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="userPhone" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Institution</label>
                    <input value="{{ $data->institusi }}" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="userIstitution" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Country</label>
                    <input value="{{ $data->negara }}" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" name="userCountry" />
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Topics</label>
                    <select class="form-control" name="gender">
                        <option value="Laki-Laki" @if ($data->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki
                        </option>
                        <option value="Perempuan"@if ($data->jenis_kelamin == 'Perempuan') selected @endif>Perempuan
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary"
                    onClick="return confirm('Anda yakin ingin mengubah?')">Submit</button>
            </form>
        </div>
    </div>
@endsection
