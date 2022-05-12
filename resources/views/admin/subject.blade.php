
@extends('layouts.admin2')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="mt-3">MANAGEMENT KELAS</h1>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                   @foreach($package as $data)
                   <div class="col-sm-6">
                       {{$data->name}} <br>
                       @foreach($data->subject as $list)
                       <a href="{{route('video.list',$list->id)}}">{{$list->name}}</a>
                       @endforeach
                   </div>
                   @endforeach
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection