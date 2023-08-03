@extends('layouts.layout')
@section('content')
    <div class="bg-content" style="background-color: rgb(47, 47, 47);height:100vh">
        <div class="container">
            <img src="{{asset('/public/images/Logo_GT.png')}}" style="width: 200px;">
            <div class="row d-flex align-items-center" style="height: 90vh; width: 100%">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div class="card text-center" style="width: 500px; height: max-content; padding: 15px">
                       
                            <h3>Welcome to <br> Conference Submission System</h3>
                            <a class="btn btn-primary" href="{{ route('login.google') }}" role="button" style="width: 100%">Login or Register</a>
                    </div>
                </div>
            </div>
            <footer class="d-flex justify-content-center">
                <p class="mb-0 text-muted">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    Created by <i class="mdi mdi-heart text-danger"></i> by Saintek UIN Maliki Malang
                </p>
            </footer>
        </div>
    </div>
    

@endsection
