@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row d-flex align-items-center" style="height: 90vh; width: 100%">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="card text-center" style="width: 500px; height: max-content; padding: 15px">
                    <h3>SELAMAT DATANG</h3>
                    <a class="btn btn-primary" href="{{ route('login.google') }}" role="button" style="width: 100%">Klik untuk
                        login</a>
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
@endsection
