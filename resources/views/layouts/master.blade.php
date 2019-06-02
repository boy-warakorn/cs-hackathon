<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- nav -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{!!asset('css/indexStyle.css')!!}">
    <!-- footer -->
    <link rel="stylesheet" href="{!!asset('css/styleforfooter.css')!!}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
    @yield('head')
    <title>@yield('title')</title>

</head>

<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <p class="topic">Difficulty</p>
        <ul>
            <li>
                <a href="/hard">Hard</a>
            </li>
            <li>
                <a href="/vh">Very Hard</a>
            </li>
            <li>
                <a href="/eh">Extremely Hard</a>
            </li>
        </ul>
        <p class="topic">Create a post</p>
        <ul>
            <p class="descript">A channel for both givers and recipients to be able to connect to each other
                to create education opportunities with students in rural area</p>
            <a href="{{action('PostsController@create')}}" class="btn btn-warning">POST</a>

        </ul>
        <p class="topic">Donate</p>
        <ul>
            <p class="descript">Contributing to EduEco for helping school in rural area</p>
            <a href="/#donate" class="btn btn-warning">DONATE</a>
        </ul>
        <p class="topic">Successfull Activity</p>
        <ul>
            <p class="descript">You can see our past activities that we went to various provinces to teaching children</p>
            <a href="/#success" class="btn btn-warning">VISIT</a>
        </ul>
    </div>
    <div id="main">
        <nav>
            <ul>
                <button class="openbtn" onclick="openNav()">☰ Menu</button>
            </ul>
            <img class="logo" src="{!!asset('images/logonav.png')!!}">
            <ul class="right">
                <li class="nav-item navli">
                    <a href="/" class="nav-link link">Home</a>
                </li>
                @guest
                <li class="nav-item navli">
                    <a class="nav-link link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item navli">
                    <a class="nav-link link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                @if(Auth::check() && Auth::user()->roleid == 1)
                <li class="nav-item navli">
                    <a class="nav-link link" href="/posts">manage post</a>
                </li>
                @endif
                <li class="nav-item navli">
                    <a id="navbarDropdown" class="nav-linke link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="dropdown" >
                        <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </nav>
        @yield('content')

        <footer class="page-footer font-small pt-4">

            <div class="container-fluid text-center text-md-left top ">

                <div class="row">

                    <div class="col-md-4 mt-md-0 mt-3" style="text-align: center">
                        <h5 class="text-uppercase">Reservations :</b></h5>
                        <h6>Please call</h6>
                        <h6>(887) 654-3210</h6>
                    </div>


                    <hr class="clearfix w-100 d-md-none pb-3" />

                    <div class="col-md-4 mb-md-0 mb-3" style="text-align: center">
                        <h5 class="text-uppercase">Address :</h5>
                        <p>
                            King Mongkut’s University of Technology Thonburi (KMUTT) 126
                            Pracha Uthit Rd., Bang Mod, Thung Khru, Bangkok 10140, Thailand
                        </p>
                    </div>



                    <div class="col-md-4 mb-md-0 mb-3" style="text-align: center">
                        <h5 class="text-uppercase">Contact us :</h5><br>
                        <a class="fb-ic icon">
                            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x">
                            </i>
                        </a>
                        <a class="gplus-ic icon">
                            <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x">
                            </i>
                        </a>
                        <a class="git-ic icon">
                            <i class="fab fa-github white-text mr-md-5 mr-3 fa-2x"></i>
                        </a>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center blue py-3 bot">
                © 2019 Copyright:
                <a href="#"> EduEco.com</a>
            </div>
            <!-- Copyright -->
            @yield('footer')
        </footer>
    </div>
    <!-- Footer -->
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
</body>

</html>