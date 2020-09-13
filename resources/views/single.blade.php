@extends('master/guest')
@section('content')
    <main class="main-content" dir="rtl">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs" dir="ltr">
                    <a href="{{url('/')}}">Home</a>
                    <a href="{{url('/review')}}">Movie Review</a>
                    <span>اسم فیلم</span>
                </div>

                <div class="content" style="direction: rtl">
                    <div class="row">
                        <div class="col-md-6">
                            <figure class="movie-poster"><img src="{{asset('dummy/single-image.jpg')}}" alt="#"></figure>
                        </div>
                        <div class="col-md-6">
                            <h2 class="movie-title">اسم فیلم</h2>
                            <div class="movie-summary">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                            </div>
                            <ul class="movie-meta">
                                <li><strong>امتیاز:</strong>
                                    <div class="star-rating" title="Rated 4.00 out of 5"><span style="width:80%"><strong class="rating">4.00</strong> out of 5</span></div>
                                </li>
                                <li><strong>مدت زمان:</strong> 98 min</li>
                                <li><strong>تاریخ تولید:</strong> 22 March 2013 (USA)</li>
                                <li><strong>دسته بندی:</strong> Animation/Adventure/Comedy</li>
                            </ul>

                            <ul class="starring">
                                <li><strong>کارگردان:</strong> Kirk de Mico (as Kirk DeMico). Chris Sanders</li>
                                <li><strong>نویسنده:</strong> Chris Sanders (screenplay), Kirk De Micco (screenplay)</li>
                                <li><strong>بازیگران برجسته:</strong> Nicolas Cage, Ryan Reynolds, Emma Stone</li>
                            </ul>
                        </div>
                    </div> <!-- .row -->

                </div>
            </div>
        </div> <!-- .container -->
        <div style="margin-right: 12%;margin-top: 30px;color: white"><h2>دیدگاه ها</h2></div>

        <div style="margin-right: 12%">


            <div  style="border-radius: 10px;height: auto;width: 300px;margin: 30px;background-color: rgb(183 217 209 / 48%);word-break: break-all;padding: 5px;">
                <div style="height: 30px;width: 50%;display: flex;align-items: baseline">
                  <i class="fa fa-comment"  style="color: white"></i><h4 style="margin-right: 10px;color: white">
                        نام کاربر</h4>
                </div>
                <p style="color: white">متن نظر</p>

            </div>



        </div>
    </main>
@endsection
