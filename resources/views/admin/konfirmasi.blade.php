
@extends('layouts.admin2')
@section('scripttop')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="mt-5 mr-3">Daftar Pembayaran User</h1>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Paket</th>
                        <th>Status</th>
                        <th>Bukti bayar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>  

                    <?php $no=1;?>  
                    @foreach ($transaksi as $key => $data)
                    <tr>
                        <td>{{$transaksi->firstItem() + $key}}</td>
                        <td>{{$data->user->name}}</td>
                        <td>{{$data->package->name}}</td>
                        <td>@if ($data->status==2)
                            <div class="">
                                Sudah Konfirmasi
                            </div>
                            @elseif ($data->status==1)
                            <div class="">
                                Sudah Membayar, Belum dikonfirmasi
                            </div>
                            @else
                            <div class="">
                                Belum Membayar
                            </div>
                        @endif</td>
                        <td><img id="myImg" src="{{asset('storage/'.$data->photo)}}" style="width:60px" onclick="onClick(this)" class="modal-hover-opacity"></td>
                        <td>@if($data->status==1)
                            <form action="{{route('admin.selesai')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Konfirmasi
                                    </button>
                                </div>
                            </form>
                            <form action="{{route('admin.hapus')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        Deny
                                    </button>
                                </div>
                            </form>
                            @elseif($data->status == 0)
                            <form action="{{route('admin.hapus')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        Deny
                                    </button>
                                </div>
                            </form>
                            @elseif($data->status == 2)
                            <div class="col-md-6 offset-md-4">
                            <a href="#" class="btn btn-success">DONE</a>
                            </div>
                            @endif
                            </td>
                    </tr>
                    
                    @endforeach
                </tbody>

            </table>
            {{$transaksi->links()}}
            <div id="modal01" class="modal" onclick="this.style.display='none'">
                <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <div class="modal-content" >
                  <img id="img01" class="img-fluid" style="width:auto; height:auto; display:block;">
                </div>
              </div>
            {{-- {{$data->links()}} --}}
            {{-- <div class="card">
                <div class="card-header">Konfirmasi pembayaran</div>
  
                <div class="card-body">
                    <div class="row">
                        @foreach($transaksi as $data)
                        <div class="col-sm-6">

                            {{$data->id}} , {{$data->package->name}}, {{$data->user->name}}, {{$data->status}}
                            @if($data->status==1)
                                <img src="{{asset('storage/'.$data->photo)}}" style="width:60px">
                            @endif
                        </div>
                        <div class="col-sm-6">
                            @if($data->status==1)
                            <form action="{{route('admin.selesai')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Konfirmasi
                                    </button>
                                </div>
                            </form>
                            @elseif($data->status == 0)
                            Belum Bayar
                            @elseif($data->status == 2)
                            Sudah Bayar
                            @endif

                            <form action="{{route('admin.hapus')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        Hapus
                                    </button>
                                </div>
                            </form>
                        </div> 

                    @endforeach
                   </div>
                </div>
            </div> --}}
        </div>
        </div>
    </div>
</div>
<script>
   function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>
@endsection
