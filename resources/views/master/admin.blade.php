<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>مدیریت</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{asset('bootstrap.css')}}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{asset('fonts/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('font-awesome.css')}}" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="{{asset('basic.css')}}" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{asset('custom.css')}}" rel="stylesheet" />
    <link href="{{asset('bootstrap-fileupload.min.css')}}" rel="stylesheet" />

    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>

<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">infinit movie</a>
        </div>

        <div class="header-right">


            <a href="login.html" class="btn btn-danger" title="Logout">خروج</a>

        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <div class="user-img-div">
                        <img src="assets/img/user.png" class="img-thumbnail" />

                        <div class="inner-text">
                            Jhon Deo Alex
                            <br />
                            <small>Last Login : 2 Weeks Ago </small>
                        </div>
                    </div>

                </li>



                <li>
                    <a href="#"><i class="fa fa-desktop "></i>منو </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{url('/dashboard/admin')}}"><i class="fa fa-plus"></i>افزودن فیلم</a>
                        </li>
                        <li>
                            <a href="{{url('/dashboard/admin/all')}}"><i class="fa fa-edit "></i> همه ی فیلم ها</a>
                        </li>

                        <li>
                            <a href="{{url('/dashboard/admin/category')}}"><i class="fa fa-bars "></i>دسته بندی</a>
                        </li>
                        <li>
                            <a href="{{url('/dashboard/admin/edithome')}}"><i class="fa fa-bars "></i>تغییر عکس های صفحه اصلی </a>
                        </li>
                        <li>
                            <a href="{{url('/dashboard/admin/edithome')}}"><i class="fa fa-home "></i>صفحه اصلی</a>
                        </li>



                    </ul>
                </li>





            </ul>

        </div>

    </nav>
    <div id="page-wrapper">
        <div id="page-inner">

@yield('content')

</div>
<!-- /. PAGE INNER  -->
</div>

</div>



<script src="{{asset('js/admin/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{asset('js/admin/bootstrap.js')}}"></script>
<!-- PAGE LEVEL SCRIPTS -->
<script src="{{asset('js/admin/bootstrap-fileupload.js')}}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{asset('js/admin/jquery.metisMenu.js')}}"></script>
<!-- CUSTOM SCRIPTS -->
<script src="{{asset('js/admin/custom.js')}}"></script>
</body>
</html>
