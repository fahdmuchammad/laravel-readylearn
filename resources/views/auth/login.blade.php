@extends('layouts.app')
  
@section('content')
<main class="login-form">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Login dulu yuk!</h2>
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
                    
                      <h3 class="mb-4">Sign In</h3>
                  </div>
                        
              </div>
              
                    <form action="{{ route('login.post') }}" class="signin-form" method="POST">
                        @csrf
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
    </div>
  </div>
</main>
@endsection