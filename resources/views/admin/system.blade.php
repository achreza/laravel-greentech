@extends('layouts.layout')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">System Status</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form action="">
                        <div class="form-group">
                            <label for="">Abstract Submission Status</label>
                            <select class="form-control" name="system-status">
                                <option value="1">On</option>
                                <option value="0">Off</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Payment</label>
                            <select class="form-control" name="payment">
                                <option value="1">On</option>
                                <option value="0">Off</option>

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
