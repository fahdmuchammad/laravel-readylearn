
@extends('layouts.admin2')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="mt-3 text-center pb-3">MANAGEMENT KELAS</h1>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                   @foreach($package as $data)
                   <div class="col-sm-6 mb-3">
                       <h2 class="text-center">{{$data->name}}</h2> <br>
                       <div class="text-center">
                            @foreach($data->subject as $list)
                                <div style="border: 1px solid black; display: inline-block; width: 10rem; margin: 1rem; padding: 1rem; border-radius: 30px">
                                    <h4 class="text-center">{{$list->name}}</h4>
                                    <div class="text-center">
                                        <a  href="{{route('video.list',$list->id)}}" type="button" class="btn btn-primary" style="display: inline-block; margin-top: 25px">Manage</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                   </div>
                   @endforeach
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection