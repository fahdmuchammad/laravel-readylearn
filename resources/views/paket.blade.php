
@extends('layouts.app')
  
  @section('content')
  <div class="body" style="padding-bottom:6rem; background-image: url({{asset('assets/images/awan.svg')}}); height: 100%; background-repeat: no-repeat; background-size: cover;">
  <div class="container">
    <div class="row justify-content-center">
      <div>
          <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center" style="color: white">
                <h1 class="display-4">Revid</h1>
                <p class="lead">Revid adalah produk dari ReadyLearn yang dapat menunjang 
                    pembelajaran dari siswa untuk menggapai cita menjadi mahasiswa di PTN impian.</p>
          </div>
          <div class="container">
              <div class="card-deck mb-3 text-center"> 
                  @foreach ($paket as $data)
                      
                  <div class="card mb-4 box-shadow">
                    <div class="card-header">
                      <h4 class="my-0 font-weight-normal">{{$data->name}}</h4>
                    </div>
                    <div class="card-body rounded">
                      <?php $hasil = $data->transaction->where('user_id',Auth::user()->id);
                        ?>  
                     
                      
                        {{-- <li>10 GB of storage</li>
                        <li>Priority email support</li>
                        <li>Help center access</li> --}}
                        @if($hasil->count()==0) {{-- jika belum membeli--}} 
                        <h1 class="card-title pricing-card-title">RP. {{number_format($data->price,2)}}<small class="text-muted"><br>/unlimited</small></h1>
                      <ul class="list-unstyled mt-3 mb-4">
                        @endif 
                        <li style="list-style-type: none">{{$data->description}}</li>   
                        <div class="mb-3"></div>
                        {{-- {{$hasil}} --}}
                        @if($hasil->count()>0) {{-- jika sudah membeli--}}
                            @if($hasil->first()->status == 0)
                            <button onclick="window.location.href='{{route('paket.bayar',$hasil->first()->id)}}'" class="btn btn-primary">
                                Lengkapi Form
                            </button>
                            @elseif($hasil->first()->status == 1)
                            <button type="submit" class="btn btn-primary">
                                Menunggu Konfirmasi
                            </button>
                            @elseif($hasil->first()->status == 2)
                            <a href="{{route('kelas', $data->id)}}" class="btn btn-primary">
                                Masuk Kelas
                            </a>
                            @endif
                        @else
                             <form action="{{route('paket.beli')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                    <button type="submit" class="btn btn-primary">
                                        Beli
                                    </button>
                            </form>
                            @endif
                      </ul>
                      
                    </div>
                  </div>
                  @endforeach
    
                  {{-- <div class="card-body">
                      <div class="row">
                        
                     @foreach($paket as $data)
                     <div class="col-sm-6">{{$data->id}}{{$data->name}}
                         <p>{{$data->description}}</p>
                         <p>{{$data->price}}</p>
                        </div>              
                       
                     @endforeach --}}
                     </div>
                  </div>
              </div>
          </div>
        </div>
          
      </div>
      
  </div>
</div>
  
  @endsection