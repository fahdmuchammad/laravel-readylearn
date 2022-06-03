@extends('layouts.app')
@section('content')
<div class="body" style="padding-bottom:6rem; background-image: url({{asset('assets/images/awan.svg')}}); height: 100%; background-repeat: no-repeat; background-size: cover;">
    <div class="container mb-5 pt-5">
        <div class="card text-center mb-5">
            <h1 class="card-header">Akun belum terverifikasi</h1>
            <div class="card-body">
                <div class="alert alert-danger">
                    <p class="card-text">Silahkan lakukan verifikasi email terlebih dahulu. </p>             
                </div>
                <a class="btn btn-warning" href={{route('resend')}}>Kirim ulang code</a>
            </div>
        </div>
    </div>
</div>
@endsection