<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>

    @stack('prepend-style')
    <!-- Custom fonts for this template-->
  <link href="{{ url('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @stack('addon-style')
    
  </head>
  <body>
    {{-- @include('includes.navbar-alternate')     --}}
    @yield('content')
    {{-- @include('includes.footer')     --}}

    @stack('prepend-script')
    <!-- Bootstrap core JavaScript-->
  <script src="{{ url('backend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('backend/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ url('backend/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('backend/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ url('backend/js/demo/chart-pie-demo.js') }}"></script>
    @stack('addon-script')
  </body>
</html>