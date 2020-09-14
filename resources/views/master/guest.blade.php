<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Movie Review</title>
    <link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('style.css')}}">

    @if(url()->current() == "http://localhost/kitetail/public/search_index")
        <link rel="stylesheet" href="{{asset('search.css')}}">
    @endif


    <link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet" type="text/css">



    <link rel="stylesheet" href="{{asset('style.css')}}">



</head>


<body>

<div id="site-content">
    <header class="site-header">
        <div class="container">
            <a href="{{url('/')}}" id="branding">
                <img src="images/logo.png" alt="" class="logo">
                <div class="logo-copy">
                    <h1 class="site-title" style="font-family: vasir">نام شرکت</h1>
                    <small class="site-description">Tagline goes here</small>
                </div>
            </a> <!-- #branding -->

            <div class="main-navigation">
                <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                <ul class="menu">
                    <li class="menu-item current-menu-item"><a href="/">خانه</a></li>
                    <li class="menu-item"><a href="about">درباره ما</a></li>
                    <li class="menu-item"><a href="review">فیلم ها</a></li>
                    <li class="menu-item"><a href="joinus">Join us</a></li>
                    <li class="menu-item"><a href="contact">پیشنهاد فیلم</a></li>
                </ul> <!-- .menu -->

                <form action="#" class="search-form">
                    <input type="text" placeholder="Search...">
                    <button><i class="fa fa-search"></i></button>
                </form>
            </div> <!-- .main-navigation -->

            <div class="mobile-navigation"></div>
        </div>
    </header>
@yield('content')


<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">About Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia tempore vitae mollitia nesciunt saepe cupiditate</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">Recent Review</h3>
                    <ul class="no-bullet">
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Sit amet consecture</a></li>
                        <li><a href="#">Dolorem respequem</a></li>
                        <li><a href="#">Invenore veritae</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">Help Center</h3>
                    <ul class="no-bullet">
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Sit amet consecture</a></li>
                        <li><a href="#">Dolorem respequem</a></li>
                        <li><a href="#">Invenore veritae</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">Join Us</h3>
                    <ul class="no-bullet">
                        <li><a href="#">Lorem ipsum dolor</a></li>
                        <li><a href="#">Sit amet consecture</a></li>
                        <li><a href="#">Dolorem respequem</a></li>
                        <li><a href="#">Invenore veritae</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">Social Media</h3>
                    <ul class="no-bullet">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Google+</a></li>
                        <li><a href="#">Pinterest</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="widget">
                    <h3 class="widget-title">Newsletter</h3>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Email Address">
                    </form>
                </div>
            </div>
        </div> <!-- .row -->

        <div class="colophon">Copyright 2014 Company name, Designed by Themezy. All rights reserved</div>
    </div> <!-- .container -->

</footer>
</div>
<!-- Default snippet for navigation -->



<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/auth.js')}}"></script>

</body>

</html>
