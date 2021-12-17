
<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>One Health - Medical Center</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">

  
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        @if(Route::has('login'))
        @auth
        <a class="navbar-brand" href="{{route('redirectohome') }}"><span class="text-primary">One</span>-Health</a>
        @else

        <a class="navbar-brand" href="{{route('userindex') }}"><span class="text-primary">One</span>-Health</a>
       
        @endauth
        @endif
        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
          @if(Route::has('login'))
              @auth
            <li class="nav-item {{ Request::is('home*') ? 'active' : ''}}">

            @else
            <li class="nav-item {{ Request::is('/*') ? 'active' : ''}}">
              @endauth
              @endif

            @if(Route::has('login'))
              @auth
              <a class="nav-link" href="{{ route('redirectohome') }}">Home</a>
              
              @else
              <a class="nav-link" href="{{ route('userindex') }}">Home</a>
              @endauth

              @endif
            </li>
            <li class="nav-item {{ Request::is('about') ? 'active' : ''}}">
              <a class="nav-link " href="{{route('about') }}">About Us</a>
            </li>
            <li class="nav-item {{ Request::is('doctors') ? 'active' : ''}}">
              <a class="nav-link" href="{{route('showalldoctors') }}">Doctors</a>
            </li>
           
            <li class="nav-item {{ Request::is('contact_us') ? 'active' : '' }}">
              <a class="nav-link" href="{{route ('contact')}}">Contact</a>
            </li>

            @if(Route::has('login'))
            
            @auth
            <li class="nav-item">
            <x-app-layout></x-app-layout>
            </li>
           

            @else
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
            </li>

            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
            </li>
           
            @endauth
            
            @endif

          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  <div class="container" style="margin-top: 8px;">
    
      @if(session()->has('message'))

    <div class="alert alert-success">

      <button type="button" class="close" data-dismiss="alert">x</button>
        <div style="text-align: center">{{session()->get('message') }}</div>
    </div>
    @endif

  </div>
  