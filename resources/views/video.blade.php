
@extends('layouts.app')
@section('content')
<div class="body" style="background-image: url({{asset('assets/images/awan.svg')}}); height: 100%; background-repeat: no-repeat; background-size: cover;">
<div class="container pb-4">
    <div class="row justify-content-center pt-3" style="color: white">
        <p class="hi">Hi, {{Auth::user()->name}} selamat belajar mata pelajaran {{$namasub}}</p>
    </div>
    <div class="row">
        <div class="col-md-3">
            <a class="btn btn-warning" href="http://localhost/readylearn/public/kelas/{{$paket}}">&#60 back</a>
        </div>
    </div>
        <div class="col-md-12" style="margin-top: 2rem">
            <div class="row">
            <div class="col-md-8 video-container">
                <iframe class="video-iframe" src="{{$detail->video}}?autoplay=1" allow="autoplay" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-4"> 
                <div class="row px-3" style="overflow-y: scroll;">
                    <h3 class="ml-3" style="color: white">Kumpulan Materi {{$namasub}}</h3>
                    @foreach($lainnya as $data)
                    <div class="mb-3" style="width: 100%">
                        <a href="{{route('kelas.detail',[$paket,$subjek,$data->id])}}">
                            <Button class="pilihkelas">{{$data->name}}</Button>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
            </div>
            {{-- <div class="card">
                <div class="card-header">PILIHVIDEO</div>
  
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <iframe src="{{$detail->video}}" frameborder="4"></iframe>
                        </div>
                        <div class="col-4">
                            @foreach($lainnya as $data)
                            <a href="{{route('kelas.detail',[$paket,$subjek,$data->id])}}">
                                <Button>{{$data->name}}</Button>
                               </a>
                            @endforeach
                        </div>
                   </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
</div>
@endsection
