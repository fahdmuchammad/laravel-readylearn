@extends('layouts.app')
  
@section('content')
<main class="login-form">
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Mari Daftar sebelum belajar!</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 col-lg-4">
            <div class="wrap d-md-flex">
                
          </div>
          
                <div class="login-wrap flex">
                   
              <div class="d-flex">
                  <div class="w-100">
                    @if (session('success'))
                    <div class="alert alert-success" style="position: absolute" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                    
                      <h3 class="mb-4">Register</h3>
                  </div>
                        
              </div>
              
                    <form action="{{ route('register.post') }}" method="POST" class="register-form">
                        @csrf
                     <div class="form-group mb-3">
                      <label class="label" for="name">Name</label>
                      <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus>
                    </div>
                     <div class="form-group mb-3">
                      <label class="label" for="email_adress">E-Mail</label>
                      <input type="email" id="email_address" name="email" class="form-control" placeholder="email" required autofocus>
                    </div>
                    <div class="form-group mb-3">
                    <label class="label" for="password">Password</label>
                    <input type="password" type="password" id="password" class="form-control" name="password" placeholder="password"required>
                                @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                    </div>
            
                     </form>
                    <p class="text-center">Not a member? <a href="{{ route('register') }}">Sign Up</a></p>
                </div>
            </div>
        </div>
          {{-- <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Register</div>
                  <div class="card-body">
  
                      <form action="{{ route('register.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" class="form-control" name="name" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div> --}}
      </div>
  </div>
</main>
@endsection