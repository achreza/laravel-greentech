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
            <div class="row">
                <div class="col-md-12">
                    <form action="/participant/payment" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Payment</label>
                            <select class="form-control" name="payment">
                                <option value="early">Early Bird</option>
                                <option value="regular">Regular</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
