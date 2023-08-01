@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/presenter/payment" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Abstract Submission Status</label>
                        <select class="form-control" name="payment">
                            <option value="1">Early Bird</option>
                            <option value="0">Regular</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
            </div>
        </div>
    </div>
@endsection
