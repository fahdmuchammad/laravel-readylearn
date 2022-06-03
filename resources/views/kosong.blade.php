@extends('layouts.app')
@section('content')
<div class="body" style="background-image: url({{asset('assets/images/awan.svg')}}); height: 100%; background-repeat: no-repeat; background-size: cover; color:white;">
<div class="container  pt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div>
                <div class="error-actions">
                    <a href="http://localhost/readylearn/public/paket" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Back to Kelas </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection