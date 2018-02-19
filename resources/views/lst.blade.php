<!DOCTYPE html>
<html lang="en">
    <head> <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>
        <!-- Bootstrap Core CSS -->
       
        <script src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ URL::asset('/js/tether.min.js') }}" ></script>
        <script src="{{ URL::asset('/js/app.js') }}" ></script>
         <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">

        <!-- Custom CSS -->
        <link href="{{ URL::asset('css/inst.css') }}" rel="stylesheet">
        <!-- Custom Fonts -->
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Fonts -->
            <!-- Styles -->
        <style>.bg1
        {
            background: url( {{ URL::asset('img/bg2.jpg') }}) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
             .navbar-transparan {
    border-width: 0px;
    -webkit-box-shadow: 0px 0px;
    box-shadow: 0px 0px;
    background-color: rgba(0,0,0,0.0);
}
            @media screen and (max-width: 480px)  
{
    .navbar-transparan
    {
       background-color: #111;
    }   
}
        </style>
    </head>
    <body>
        <div class="bg1 full-height ">

            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse navbar-transparan">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{URL::to('/home')}}">STDI</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class=""><a class="nav-link" href="{{URL::to('/mahasiswa')}}">Mahasiswa</a></li>
        <li class=""><a class="nav-link" href="{{URL::to('/jadwal')}}">Jadwal</a></li>
        <li class=""><a class="nav-link" href="{{URL::to('/kurikulum')}}">Kurikulum</a></li>
        <li class=""><a class="nav-link" href="{{URL::to('/dosen')}}">Dosen</a></li>
        @if (Auth::guest())
          <li class=""><a class="nav-link" href="{{URL::to('/login')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Login </a></li>
        @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->nim }} <span class="caret"></span>
            </a>

        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="{{ url('/logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
                </li>
            </ul>
        </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
            <nav class="navbar"></nav>
            
            @yield('content')
        </div>
    </body>
</html>
