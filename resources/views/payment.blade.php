
@extends('layouts.app')
  
  @section('content')
  <div class="body" style="background-image: url({{asset('assets/images/awan.svg')}}); height: 100%; background-repeat: no-repeat; background-size: cover;">
  <div class="container pt-5 pb-5">
      <div class="row justify-content-center">
            <div class="col-lg-8 pl-lg-0">
              <div class="card card-details">
                  {{-- @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif --}}
                <h1 class="text-center">Mau Belajar apa?</h1>
                <p class="pl-3">
                  {{Auth::user()->name}} ingin belajar 
                </p>
                <div class="attendee">
                  <table class="table table-responsive-sm text-center">
                    <thead>
                      <tr>
                        <td>Name</td>
                        <td>Paket</td>
                        <td>Price</td>
                        <td></td>
                      </tr>
                    </thead>
                    <tbody>
                      
                          <tr>
                              <td class="align-middle">
                                {{Auth::user()->name}}
                              </td>
                              <td class="align-middle">
                                {{$transaction->package->name}}
                              </td>
                              <td class="align-middle">
                                {{$transaction->gross_amount}}
                              </td>
                              <td class="align-middle">
                                  
                              </td>
                              <td class="align-middle">
                                  <a href="">
                                      <img src="" alt="" />
                                  </a>
                              </td>
                          </tr>
                      
                          <tr>
                              <td colspan="6" class="text-center">
                                  
                              </td>
                          </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card card-details card-right p-3">
                <h2>Checkout Informations</h2>
                <table class="trip-informations">
                  <tr>
                    <th width="50%">Members</th>
                    <td width="50%" class="text-right">
                      {{Auth::user()->name}}
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Transaction ID</th>
                    <td width="50%" class="text-right">
                      {{$transaction->name}}
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Trip Price</th>
                    <td width="50%" class="text-right">
                      
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">User ID</th>
                    <td width="50%" class="text-right">
                      {{Auth::user()->id}}
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Total (+Unique)</th>
                    <td width="50%" class="text-right text-total">
                      <div class="text-blue">
                        {{number_format($transaction->gross_amount,2)}}
                      </div>
                      <span class="text-orange"></span>
                    </td>
                  </tr>
                </table>
    
                <hr />
                <h2>Payment Instructions</h2>
                <p class="payment-instructions">
                  Bayar Ke Rekening yang tersedia lalu upload bukti pembayaran.
                </p>
                <div class="bank">
                  <div class="bank-item pb-3">
                    <img
                      src=""
                      alt=""
                      class="bank-image"
                    />
                    <div class="description">
                      <h3>PT Readylearn</h3>
                      <p>
                        0881 8829 8800
                        <br />
                        Bank Central Asia
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="bank-item pb-3">
                    <img
                      src=""
                      alt=""
                      class="bank-image"
                    />
                    <div class="description">
                      <h3>PT Readylearn</h3>
                      <p>
                        0899 8501 7888
                        <br />
                        Bank HSBC
                      </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <form action="{{route('paket.konfirmasi')}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                <label for="">Photo</label>
                <div class="input-group">
                    <input type="file" name="photo" class="form-control">
                </div>
            </div>
            @if ($errors->has('photo'))
                <ul class="alert alert-danger">
                    @foreach ($errors->get('photo') as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </ul>
            @endif
              <div class="join-container">
                <input type="hidden" name="id" value="{{$transaction->id}}">
                <button type="submit" class="btn btn-block btn-success">
                  I Have Made Payment
                </button>
              </div>
            </form>
              <div class="join-container">
                <button class="btn btn-block btn-primary mt-3 py-2" id="pay-button">
                  MIDTRANS
                </button>
              </div>
              <div class="text-center mt-3">
                <a href="" class="btn btn-block btn-danger mt-3 py-2">
                  Cancel Booking
                </a>
              </div>
            </div>
          </div>
        
          {{-- <div class="col-md-8 mt-3">
              <div class="card">
                  <div class="card-header"><h1>PEMBAYARAN</h1></div>
                  <div class="card-body">
                      <div class="row">
                          Silahkan lakukan pembayaran ke rekening ini &nbsp;<b>
                              </div>
                              <div class="row">
                            <br>atas nama : Raihan 
                             No.rek : 1234
                             </div>
                    
                     <div class="col-sm-6">{{$transaction->id}}{{$transaction->package->name}}
                         <p>{{$transaction->package->description}}</p>
                        </div>                        
                            
                            <form action="{{route('paket.konfirmasi')}}" method="POST" enctype="multipart/form-data">

                                @csrf
                                <div class="form-group">
                                <label for="">Photo</label>
                                <div class="input-group">
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>
                            @if ($errors->has('photo'))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->get('photo') as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                </ul>
                            @endif
                                <input type="hidden" name="id" value="{{$transaction->id}}">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Konfirmasi
                                    </button>
                                </div>
                            </form>
                     </div>
                  </div>
              </div>
          </div> --}}
      </div>
     
  </div>
  </div>
  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    console.log(payButton);
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snap_token}}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          console.log(result);
          send_response_to_form(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
          console.log(result);
          send_response_to_form(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
          console.log(result);
          send_response_to_form(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
      })
    });
  //   function send_response_to_form(result){
  //     document.getElementById('json_callback').value = JSON.stringify(result);
  //     $('#submit_form').submit();
  //   }
  </script>
  @endsection
  
  @push('prepend-style')
  <link rel="stylesheet" href="{{ url('libraries/gijgo/css/gijgo.min.css') }}" />
@endpush

@push('addon-script')
  <script src="{{ url('libraries/gijgo/js/gijgo.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        uiLibrary: 'bootstrap4',
        icons: {
          rightIcon: '<img src="{{ url('frontend/images/ic_doe.png') }}" />'
        }
      });
    });
  </script>
@endpush
