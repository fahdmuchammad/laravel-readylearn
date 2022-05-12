@extends('layouts.app')
  
@section('content')
<div class="flex-center position-ref full-height" style="padding-top: 100px; padding-bottom: 400px; background-image: url({{asset('assets/images/awan.svg')}}); height: 100%; background-repeat: no-repeat; background-size: cover;">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    You are Logged In
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection