@extends('layouts.layout')
@section('content')
    <div class="wrap" style="height: 100vh; overflow: hidden; padding: 30px;">
        <div class="row align-self-center ">
            <div class="col-lg-8">
                <h1 class="font-weight-bold text-muted ml-2" style="font-size: 250px;">Illegal Access</h1>
            </div>
            <div class="col-lg-4 d-flex align-items-center justify-content-center">
                <img src="{{ asset('images/stop.svg') }}" alt="">
            </div>
        </div>
    </div>
@endsection
