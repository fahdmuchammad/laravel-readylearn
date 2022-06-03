<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Readylearn</title>

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

        <!-- Styles -->
        <style>
            .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Quicksand;
            font-weight: 400;
        }
            .navbar {
                z-index: 99;
                position: fixed;
                top: 0;
                background-color: #fff;
                width: 100%;
            }
            body {
                background-color: #fff;
                /* color: #636b6f; */
                font-family: 'Bebas Neue';
                font-weight: 800;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .carousel-item{
                border-radius: 24px;
                min-height: 400px; 
                background-color: #8dd7cf;
                overflow: hidden;
            }
            
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

        <div class="flex-center position-ref full-height" style="padding-top: 100px; padding-bottom: 100px; background-image: url({{asset('assets/images/awan.svg')}}); height: 100%; background-repeat: no-repeat; background-size: cover;">
            <div class="container" style="margin-top: 100px">
                <div class="col-12 col-md">
                    <div class="row featurette d-flex align-items-center">
                        <div class="col-md-6">
                            <h2 class="featurette-heading" style="font-size: 40pt; color:#fff">#RAIHCITACITA<span style="color:#fff"> Bersama ReadyLearn</span></h2>
                            <p class="lead" style="font-family: quicksand; color:#fff">Untuk kamu, yang merasa kelas 12 atau alumni dan masih memiliki mimpi untuk berkuliah di PTN Impian, Yuk! belajar SBMPTN bersama kami melalui video dari pengajar yang berkualitas!</p>
                        </div>
                        
                        <div class="col-md-6">
                            <img class="featurette-image img-fluid mx-auto" src="{{asset('assets/images/image.png')}}" alt="500x500" style="width: 80%; height: 80%;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22500%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20500%20500%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17f96d32352%20text%20%7B%20fill%3A%23AAAAAA%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A25pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17f96d32352%22%3E%3Crect%20width%3D%22500%22%20height%3D%22500%22%20fill%3D%22%23EEEEEE%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22185.12109375%22%20y%3D%22261.1%22%3E500x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div style="position: relative; z-index: -1; margin: 0 0 -5rem 0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#0099ff" fill-opacity="1" d="M0,32L9.6,32C19.2,32,38,32,58,32C76.8,32,96,32,115,80C134.4,128,154,224,173,256C192,288,211,256,230,229.3C249.6,203,269,181,288,176C307.2,171,326,181,346,170.7C364.8,160,384,128,403,128C422.4,128,442,160,461,176C480,192,499,192,518,170.7C537.6,149,557,107,576,101.3C595.2,96,614,128,634,133.3C652.8,139,672,117,691,96C710.4,75,730,53,749,74.7C768,96,787,160,806,170.7C825.6,181,845,139,864,128C883.2,117,902,139,922,154.7C940.8,171,960,181,979,181.3C998.4,181,1018,171,1037,144C1056,117,1075,75,1094,101.3C1113.6,128,1133,224,1152,240C1171.2,256,1190,192,1210,170.7C1228.8,149,1248,171,1267,160C1286.4,149,1306,107,1325,112C1344,117,1363,171,1382,202.7C1401.6,235,1421,245,1430,250.7L1440,256L1440,0L1430.4,0C1420.8,0,1402,0,1382,0C1363.2,0,1344,0,1325,0C1305.6,0,1286,0,1267,0C1248,0,1229,0,1210,0C1190.4,0,1171,0,1152,0C1132.8,0,1114,0,1094,0C1075.2,0,1056,0,1037,0C1017.6,0,998,0,979,0C960,0,941,0,922,0C902.4,0,883,0,864,0C844.8,0,826,0,806,0C787.2,0,768,0,749,0C729.6,0,710,0,691,0C672,0,653,0,634,0C614.4,0,595,0,576,0C556.8,0,538,0,518,0C499.2,0,480,0,461,0C441.6,0,422,0,403,0C384,0,365,0,346,0C326.4,0,307,0,288,0C268.8,0,250,0,230,0C211.2,0,192,0,173,0C153.6,0,134,0,115,0C96,0,77,0,58,0C38.4,0,19,0,10,0L0,0Z"></path>
            </svg>
        </div> --}}
        <div class="container mt-4 pb-4">
            <div class="col-12 col-md">
                <h1 class="text-xl-center" style="font-size: 70pt;">Kenapa Harus Memilih Revid??</h1>
                <div class="row d-flex flex-row">
                    <div class="col-md-4" style="text-align: center;">
                        <img class="mx-auto" src="{{asset('assets/images/image.png')}}" alt="500x500" style="width: 200px; height: 200px;">
                        <div style="text-align: center; font-size:20pt;">pengajar dari PTN Terbaik</div>
                    </div>
                    
                    <div class="col-md-4" style="text-align: center;">
                        <img class="mx-auto" src="{{asset('assets/images/image.png')}}" alt="500x500" style="width: 200px; height: 200px;">
                        <div style="text-align: center; font-size:20pt;">Materi Update dengan perkembangan UTBK tiap tahunnya</div>
                    </div>
                    <div class="col-md-4" style="text-align: center;">
                        <img class="mx-auto" src="{{asset('assets/images/image.png')}}" alt="500x500" style="width: 200px; height: 200px;">
                        <div style="text-align: center; font-size:20pt; display: inline-block;">Video dapat dinikmati kapan saja dan dimana saja</div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container mt-4 pb-4 mb-4">
            <h1 class="text-xl-center" style="font-size: 70pt;">Testimoni</h1>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active ">
                    <div class="text-center" style="padding: 3rem 30%;">
                        <h1>ini testimoni Pertama</h1>
                        <p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="text-center">
                        <div class="text-center" style="padding: 3rem 30%;">
                        <h1>ini testimoni Kedua</h1>
                        <p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."</p>
                        </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="text-center">
                        <div class="text-center" style="padding: 3rem 30%;">
                        <h1>ini testimoni Ketiga</h1>
                        <p>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."</p>
                        </div>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container">
        <footer class="pt-4 pt-md-5 border-top" style="font-family: quicksand;">
            <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src={{ asset('assets/images/logo.png') }} alt="" width="24" height="24">
                <small class="d-block mb-3 text-muted">© 2022</small>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Cool stuff</a></li>
                <li><a class="text-muted" href="#">Random feature</a></li>
                <li><a class="text-muted" href="#">Team feature</a></li>
                <li><a class="text-muted" href="#">Stuff for developers</a></li>
                <li><a class="text-muted" href="#">Another one</a></li>
                <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Resource</a></li>
                <li><a class="text-muted" href="#">Resource name</a></li>
                <li><a class="text-muted" href="#">Another resource</a></li>
                <li><a class="text-muted" href="#">Final resource</a></li>
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
