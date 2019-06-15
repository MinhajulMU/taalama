<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('asset/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/demo.css')}}">
        <!-- Pushy CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/pushy.css')}}">
    <link rel="stylesheet" href="{{asset('asset/style/style.css')}}">
    <link rel="stylesheet" href="{{asset('asset/style/media.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" />
    
    <title>@yield('title') </title>
  </head>
  <body>
        <nav class="pushy pushy-right" data-focus="#first-link">
                <div class="pushy-content">
                    <ul>
                        <li class="pushy-link"><a href="/">Home</a></li>
                        <li class="pushy-link"><a href="/register">Register</a></li>
                        <li class="pushy-link"><a href="/login">Login</a></li>
                    </ul>
                </div>
            </nav>
    
            <!-- Site Overlay -->
            <div class="site-overlay"></div>

    <div id="wrapper" class="push">
        <section id="header">
            <div class="wrap">
                <div class="row">
                    <div class="col-3">
                        <div class="logo">
                            <a href="/">
                                <img src="{{asset('asset/images/logo/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-9">
                        <nav class="d-none d-md-block">
                            <ul>
                                <li>
                                    <a href="/">Home</a>
                                </li>
                                @if (Auth::check())
                                    @if (Auth::user()->hasRole('Administrator'))
                                        <li>
                                            <a href="/adashboard">{{Auth::user()->name}} </a>
                                        </li>
                                        <li>
                                            <a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fi-power"></i> <span>Logout</span>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="/home">{{Auth::user()->name}}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fi-power"></i> <span>Logout</span>
                                </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>                              
                                    @endif
                                @else
                                    <li>
                                        <a href="/register">Register</a>
                                    </li>
                                    <li>
                                        <a href="/login">Login</a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                         <button class="menu-btn d-block d-sm-block d-md-none">&#9776;</button>
                    </div>
                </div>
            </div>
        </section>
        <div class="a"></div>
        @yield('content')
        <footer>
            <div class="wrap">
                <div class="menu text-center">
                    <a href="#">Home</a> / <a href="#">Term & Condition</a> / <a href="#">Tentang Kami</a> / <a href="#">Kontak Kami</a>
                </div><br>
                <div class="menu">
                    Copyright &copy; 2019 Ta'alama Team
                </div>
            </div>
        </footer>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="{{asset('asset/js/pushy.min.js')}}"></script>
    @stack('scripts')
</body>
</html>