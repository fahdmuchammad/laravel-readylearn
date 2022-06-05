
@extends('layouts.admin2')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <h1 class="mt-3 mr-3 text-center" style="font-size: 30pt">Manage Kelas {{$title->name}}</h1>
            <a href="{{route('video.load')}}" class="btn btn-primary float-right">+ Tambah Video</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>No.</th>
                            <th>Judul Mapel</th>
                            <th>deskripsi</th>
                            <th>Video</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($video as $data)
                        <tr>
                            <td></td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->description}}</td>
                            <td><iframe src="{{$data->video}}">Video</iframe></td>
                            <td><a href="{{route('video.edit', $data->id)}}" type="submit" class="btn btn-primary">
                                Edit
                            </a>
                            <form action="{{route('video.delete')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <input type="hidden" name="subject_id" value="{{$data->subject->id}}">
                                <div >
                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </div>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$video->links()}}
            {{-- <div class="card">
                <div class="card-header">
                    <div class="row">
                    <div class="col-8">List Video</div>
                    <div class="col-4 d-flex justify-content-end"><a href="{{route('video.load')}}" class="btn btn-primary">+ Tambah Video</a></div>
                    </div>
                </div>
                
  
                <div class="card-body">
                    <div class="row">
                   @foreach($video as $data)
                   <div class="col-sm-6">{{$data->name}}{{$data->subject->name}}

                       <p>{{$data->description}}</p>
                       <iframe src="{{$data->video}}">Video</iframe>
                      </div>              
                           
                     
                           
                              <div class="col-sm-12">
                              <input type="hidden" name="id" value="{{$data->id}}">
                              <div class="col-md-6 offset-md-4">
                                 
                                  <a href="{{route('video.edit', $data->id)}}" type="submit" class="btn btn-primary">
                                      Edit
                                  </a>
                              </div>
                            </div>
                            <form action="{{route('video.delete')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <input type="hidden" name="subject_id" value="{{$data->subject->id}}">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </div>
                            </form>
                          
                          
                   @endforeach
                   </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection