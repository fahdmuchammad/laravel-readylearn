<!DOCTYPE html>
<html>
<head>
    <title>ReadyLearn #RaihCitaCita</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="{{ asset('assets/images/logo.png') }}" rel="icon" type="image/png">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    {{-- <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-1K8jep3T9nVs7VDn"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <link href={{asset('css/pricing.css')}} rel="stylesheet">
    <link href="{{ asset('assets/images/logo.png') }}" rel="icon" type="image/png">
      <style type="text/css">
       @import url('https://fonts.googleapis.com/css2?family=Quicksand&display=swap');

  
        body{
            margin: 0;
            font-size: .9rem;
            
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #ffffff;
        }
        /* body {
            background-color: #fff;
            /* color: #636b6f; */
            font-family: 'Bebas Neue';
            font-weight: 800;
            height: 100vh;
            margin: 0;
        } */
        .navbar
        {
            z-index: 99;
            position: fixed;
            top: 0;
            background-color: #fff;
            width: 100%;
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Quicksand;
            font-weight: 400;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        iframe{
            width: 100%;
            height: 100%;
        }
        .pilihkelas{
            size: 30px;
            background-color: #7CB8F3;
            border-radius: 50px;
            border: none;
            color: white;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 100%;
        }.pilihkelas:hover{
            background-color: #212529;
            box-shadow: #7CB8F3;
        }
        .video-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            padding-top: 50%;
        }
        .video-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 15px;
        }
        .img {
            margin: 0 auto;
            display: block;
            margin-top: 20%;
        }
        .hi{
            font-size: 2rem;
        }
        .error-template {padding: 40px 15px;text-align: center;}
        .error-actions {margin-top:15px;margin-bottom:15px;}
        .error-actions .btn { margin-right:10px; }
        /* Style the Image Used to Trigger the Modal */

        
        
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light border border-bottom-2">
        <div class="container">
            <img class="mb-2" src={{ asset('assets/images/logo.png') }} alt="" width="50" height="40">
            <a class="navbar-brand" href="{{route ('welcome')}}" style="color: blue; font-size: 20pt">Ready<span style="color: orange">Learn</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
       
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" style="font-size: 20pt">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('paket.list') }}">ReVid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                    <li class="nav-item">
                        <img class="nav-link" src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&rounded=true&size=40" style="border-radius: 4px">
                    </li>
                    @endguest
                </ul>
      
            </div>
        </div>
    </nav>
  
@yield('content')
     
<div class="container" style="position: relative;">
    <footer class="pt-4 pt-md-5 border-top">
      <div class="row">
          
          <div class="col-12 col-md">
              <div class="col-4 col-md">
                  <img class="mb-2" src={{ asset('assets/images/logo.png') }} alt="" width="24" height="24">
                  <small class="d-block mb-3 text-muted">© 2018-2022</small>
                </div>
          </div>
        
        <div class="col-6 col-md">
          <h5>Features</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Revid</a></li>
            <li><a class="text-muted" href="#">Random feature</a></li>
            <li><a class="text-muted" href="#">Team feature</a></li>
            <li><a class="text-muted" href="#">Stuff for developers</a></li>
            <li><a class="text-muted" href="#">Another one</a></li>
            <li><a class="text-muted" href="#">Last time</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Social Media</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Instagram</a></li>
            <li><a class="text-muted" href="#">Youtube</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Team</a></li>
            <li><a class="text-muted" href="#">Locations</a></li>
            <li><a class="text-muted" href="#">Privacy</a></li>
            <li><a class="text-muted" href="#">Terms</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>

</body>
</html>