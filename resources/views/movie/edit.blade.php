<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('backend/img/logo/logo.png')}}" rel="icon">
  <title>Dashboard</title>

  <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" >

<link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('backend/css/ruang-admin.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">


<div id="app">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{asset('backend/img/logo/logo2.png')}}">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>



    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
          @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </li>

                            <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>

                                
                            
                        @endguest
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">

        <br><br><br>
<div class="row">
<div class="col-lg-12 margin-tb">

        <div class="pull-left">
          <h2>Edit Movie</h2>
        </div>


</div>

    <form action="{{URL('update/movie/'.$movie->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row">

            <div class="col-xs-6 col-sm-7 col-md-6">
                <div class="form-group">
                    <strong>Movie Title<strong>
                    <input type="text" name="title" class="form-control" value="{{$movie->title}}"> 

                </div>
            </div>

            <div class="col-xs-6 col-sm-7 col-md-6">
                <div class="form-group">
                    <strong>Release Date<strong>
                    <input type="Date" name="release_date" class="form-control" value="{{$movie->release_date}}"> 

                </div>
            </div>

            <div class="col-xs-6 col-sm-7 col-md-6">
                <div class="form-group">
                    <strong>Description <strong>
                    <textarea class="form-control" placeholder="Description" name="description">{{$movie->description}} </textarea>
                </div>
            </div>

            <div class="col-xs-6 col-sm-7 col-md-6">
                <div class="form-group">
                    <strong>Old Poster <strong>
                    
                    <img src="{{URL::to($movie->poster)}}" height="70px;"width="80px;">
                    <input type="hidden" name="old_poster" value="{{$movie->poster}}">

                </div>
            </div>



            <div class="col-xs-6 col-sm-7 col-md-6">
                <div class="form-group">
                    <strong>Poster<strong>
                    <input type="file" name="poster" ></input>
                </div>
            </div>

            <div class="col-xs-6 col-sm-7 col-md-6">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>




        </div>



    <form>


</div>

        </div>
        <!---Container Fluid-->
      </div>
   
    </div>
    </div>
    </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="{{asset('js/app.js')}}"></script>


  <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('backend/js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>  
</body>

</html>