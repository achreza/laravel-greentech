@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if ($option == 1 && $negara != '62')
                    <h3 class="font-weight-bold">Early Bird Payment</h3>
                    <h3>$100</h3>
                @elseif ($option == 0 && $negara != '62')
                    <h3 class="font-weight-bold">Regular Payment</h3>
                    <h3>$105</h3>
                @elseif ($option == 1 && $negara == '62')
                    <h3 class="font-weight-bold">Early Bird Payment</h3>
                    <h3>Rp 750.000</h3>
                @else
                    <h3 class="font-weight-bold">Regular Payment</h3>
                    <h3>Rp 800.000</h3>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="/presenter/payment/post/{{ $option }}" method="post">
                    @csrf
                    <div class="input-group mb-3">

                        <div class="custom-file">

                            <input type="file" class="custom-file-input" id="file-upload" name="file"
                                onchange="return fileValidation()" />
                            <label class="custom-file-label" for="inputGroupFile02"
                                aria-describedby="inputGroupFileAddon02">Payment Check</label>
                        </div>
                    </div>
                    <div id="file-upload-filename" class="mt-3 mb-3" style="display: block"><span id="status"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
            </div>
        </div>
    </div>
@endsection