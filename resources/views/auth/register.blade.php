@extends('layouts.layout')

@section('content')
    <div class="container ">
        <div class="row">
            <h1 class="font-weight-bold">Register Account</h1>
        </div>
        <div class="row d-flex align-items-center">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="card" style="width: 100%;height: max-content; padding:15px;">
                    <form action="/auth/register" method="post" name="register_form">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $email }}"
                                readonly />
                        </div>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="fullname" />
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" class="form-control" name="phone_number" />
                        </div>
                        <div class="form-group">
                            <label>Institution</label>
                            <input type="text" class="form-control" name="institution" />
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" name="country" />
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
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
                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option value="2">Presenter</option>
                                <option value="3">Participant</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" value="Register">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <footer class="d-flex justify-content-center">
            <p class="mb-0 text-muted">©
                <script>
                    document.write(new Date().getFullYear())
                </script> Created by <i class="mdi mdi-heart text-danger"></i> by Ekata Tech
            </p>
        </footer>
    </div>
@endsection
