<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coaching | Home</title>
    <!--    Font Awesome Stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/fa/css/all.min.css')}}">
    <!--    Animate CSS-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/animate.css')}}">
    <!--    Owl Carosel Stylesheets-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/owl-carosel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/owl-carosel/css/owl.theme.default.css')}}">
    <!--    Magnetic Popup-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/magnific-popup/css/magnific-popup.css')}}">
    <!--    Bootstrap-4.3 Stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/sub-dropdown.css')}}">
    <!--    Data Table CSS-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/data-table/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/data-table/css/fixedHeader.bootstrap4.min.css')}}">
    <!--    Theme Stylesheet-->
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <!--    Favicon-->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script> -->
</head>
<body>
<!--Header Start-->
@if(Auth::user()->role =='Admin')
<section>
    <div class="col-sm-12 text-center header pb-1">
        <h2 class="font-weight-bold p-1 m-0">Digital Administration Manner</h2>
        <h5 class="menu-bg p-2 pl-3 pr-3 mb-1">Admin DashBoard</h5>
        <p class="font-weight-bold mb-0">Dhanmondi, Dhaka</p>
        <p class="font-weight-bold mb-0">Email: demo@gmail.com</p>
    </div>
</section>
@endif

@if(Auth::user()->role =='User')
<section>
    <div class="col-sm-12 text-center header pb-1">
        <h2 class="font-weight-bold p-1 m-0">Digital Administration Manner</h2>
        <h5 class="menu-bg p-2 pl-3 pr-3 mb-1">Student DashBoard</h5>
        <p class="font-weight-bold mb-0">{{Auth::user()->name}}</p>
        <p class="font-weight-bold mb-0">Email: demo@gmail.com</p>
    </div>
</section>
@endif
<!--Header End-->

<!--User Avatar Start-->
@if(Auth::user()->role =='Admin')
<img class="avatar" src="{{asset('admin/assets/images/avatar.png')}}" alt="Avatar">
@endif

@if(Auth::user()->role =='User')
  @if(isset(Auth::user()->avatar))
  <img class="avatar" src="{{asset('/').Auth::user()->avatar}}" alt="Avatar"
   style="height:400px:weight:300px">
  @else
  <img class="avatar" src="{{asset('admin/assets/images/avatar.png')}}" alt="Avatar">
  @endif
@endif
<!--User Avatar Start-->

<!--Main Menu Start-->
<nav class="navbar navbar-expand-lg menu-bg">
    <!--    <a class="navbar-brand" href="#">LOGO</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mobile-menu-icon fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('/home')}}"><span class="fa fa-home"></span> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Notice
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  @if(Auth::user()->role =='Admin')
                    <li class=""><a class="dropdown-item" href="{{route('add-notice')}}">Add Notice</a></li>
                  @endif
                    <li class=""><a class="dropdown-item" href="{{route('notice-index')}}">View Notice</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Student
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Student profile</a>

                        <ul class="dropdown-menu">
                            @if(Auth::user()->role =='Admin')
                            <li><a href="{{route('user-registration')}}" class="dropdown-item">Add Student</a></li>
                            <li><a href="{{route('user-list')}}" class="dropdown-item">Student List</a></li>
                              @endif

                              @if(Auth::user()->role =='User')
                              <li><a href="{{route('user-profile',['userId'=>Auth::user()->id])}}" class="dropdown-item">Student Profile</a></li>
                              @endif
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Student Rules</a>

                        <ul class="dropdown-menu">
                            @if(Auth::user()->role =='Admin')
                            <li><a href="{{route('create-Srule')}}" class="dropdown-item">Add Rules</a></li>
                            <li><a href="{{route('view-student-rule')}}" class="dropdown-item">View Rules</a></li>
                              @endif

                              @if(Auth::user()->role =='User')
                              <li><a href="{{route('user-profile',['userId'=>Auth::user()->id])}}" class="dropdown-item">Student Profile</a></li>
                              @endif
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Student Registration</a>

                        <ul class="dropdown-menu">

                            <li><a href="{{route('student-reg-form')}}" class="dropdown-item">Registration</a></li>
                            <li><a href="" class="dropdown-item">View Rules</a></li>
                        </ul>
                    </li>
                    
                </ul>

            </li>
        @if(Auth::user()->role =='Admin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Teacher
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                    <li class=""><a class="dropdown-item" href="{{route('add-teacher-rule')}}">Add Rules</a></li>

                    <li class=""><a class="dropdown-item" href="{{route('view-teacher-rule')}}">View Rules</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Setting
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Batch</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add-batch')}}" class="dropdown-item">Add Batch</a></li>
                            <li><a href="{{route('batch-list')}}" class="dropdown-item">batch List</a></li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Section</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('add-section')}}" class="dropdown-item">Add Section</a></li>
                            <li><a href="{{route('section-list')}}" class="dropdown-item">Section List</a></li>
                        </ul>
                    </li>



                </ul>
            </li>
              @endif
        </ul>

{{--        <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="#">Logout</a>--}}
        <a class="font-weight-bold my-2 my-sm-0 mr-2 logout" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <!--        <form class="form-inline my-2 my-lg-0">-->
        <!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
        <!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
        <!--        </form>-->
    </div>
</nav>
<!--Main Menu End-->
