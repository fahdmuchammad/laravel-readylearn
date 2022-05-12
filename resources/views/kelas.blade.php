
@extends('layouts.app')
  
@section('content')
<div class="body" style="background-image: url({{asset('assets/images/awan.svg')}}); height: 100%; background-repeat: no-repeat; background-size: cover;">
  

<div class="container" style="padding-top: 2rem">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center" style="color: white">
                @if($paket == 1)
                    <h1 class="display-4">SAINTEK</h1>
                    <p class="lead">Optimalkan Belajarmu maka kamu akan mendapat skor UTBK terbaik mu!!</p>
                @elseif ($paket == 2)
                    <h1 class="display-4">SOSHUM</h1>
                    <p class="lead">Tonton Video pembelajaran kami, dengan gaya belajar yang sangat menarik!</p>
                @endif
              </div>
              <div class="card-deck mb-3 text-center">
                @foreach($kelas as $data)
                  <div class="card mb-4 sm-3 box-shadow" style="min-width: 300px">
                    <div class="card-header">
                      <h4 class="my-0 font-weight-normal">{{$data->name}}</h4>
                    </div>
                    <div class="card-body">
                      <ul class="list-unstyled mt-3 mb-4">
                        <img></>
                        <a href="{{route('kelas.detail',[$paket,$data->id,1])}}" class="btn btn-primary">Buka Kelas</a>
                      </ul>
                      
                    </div>
                  </div>
                  @endforeach
    
                  
              </div>      
            </div>
        </div>
            
            </div>
        </div>
    </div>
</div>
</div>
@endsection