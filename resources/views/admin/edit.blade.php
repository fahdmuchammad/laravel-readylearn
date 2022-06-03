@extends('layouts.admin2')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Upload Video</div>
                  <div class="card-body">
  
                      <form action="{{ route('video.change') }}" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{$video->id}}">
                          <input type="hidden" name="subject_id" value="{{$video->subject->id}}">
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">JUDUL</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" class="form-control" name="name" required autofocus value="{{$video->name}}">
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="subject"class="col-md-4 col-form-label text-md-right">subject Video</label>
                              <select class="form-select" name="subject" aria-label="Default select example" {{$video->subject->name}}>
                                  <option selected>Open this select menu</option>
                                  @foreach($subject as $sub)
                                  <option value="{{$sub->id}}" {{$sub->id == $video->subject_id ? 'selected':''}} >{{$sub->name}}</option>
                                  @endforeach
                                  @if ($errors->has('subject'))
                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                @endif
                                </select>   
                            </div>
  
                          <div class="form-group row">
                              <label for="Description" class="col-md-4 col-form-label text-md-right">Description</label>
                              <div class="col-md-6">
                                  <input type="text" id="description" class="form-control" name="description" required value="{{$video->description}}">
                                  @if ($errors->has('description'))
                                      <span class="text-danger">{{ $errors->first('description') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="Video" class="col-md-4 col-form-label text-md-right">Link Video</label>
                              <div class="col-md-6">
                                  <input type="text" id="video" class="form-control" name="video" required value="{{$video->video}}">
                                  @if ($errors->has('video'))
                                      <span class="text-danger">{{ $errors->first('video') }}</span>
                                  @endif
                              </div>
                          </div>
                         
  
                          
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Edit
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection