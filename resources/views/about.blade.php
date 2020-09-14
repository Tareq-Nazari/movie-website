@extends('master/guest')
@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{asset('index')}}">Home</a>
                <span>درباره ما</span>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <figure><img style="margin-left: 94px;margin-top: 27px;width: 50%" src="{{asset('images/logo@2x.png')}}" alt="figure image"></figure>
                </div>
                <div class="col-md-8">
                    <p class="leading"></p>
                    <p style="font-size: 2em" dir="rtl">
                        تا حالا شده بخوای یه فیلمی رو که خودت داستانشو تعیین میکنی ببینی؟
                        ما اینجا این کارو برات انجام دادیم.
                        سایت اینفینیت فیلم یه مجموعه بزرگ از فیلم های روز دنیا فقط کافیه واسه پیدا کردن فیلمت بری تو قسمت جستجوی فیلم سایتمون و اونجا داستانی که میخوای رو بنویسی همین!
                    تازه هرروز میتونی با رفتن به قسمت پیشنهاد فیلم یه فیلم خوب ببینی :)
                    </p>
                </div>
            </div>

         <!-- .row -->
<br>
            <br>
            <h2 class="section-title" dir="rtl">تیم ما</h2>
            <hr>
            <div class="row">

                <div class="col-md-3">
                    <div class="team">
                        <figure class="team-image"><img src="{{asset('images/tareq.jpg')}}" alt=""></figure>
                        <h2 class="team-name">طارق نظری</h2>
                        <small class="team-title">طراح رابط گرافیکی وب سایت</small>
                        <div class="social-links">
                            <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="" class="pinterest"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team">
                        <figure class="team-image"><img src="{{asset('images/farid.jpg')}}" alt=""></figure>
                        <h2 class="team-name">فرید سبحانی</h2>
                        <small class="team-title">طراح پایگاه داده و بکند</small>
                        <div class="social-links">
                            <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="" class="pinterest"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- .container -->
</main>
@endsection
