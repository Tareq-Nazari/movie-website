@extends('master/guest')
@section('content')
    <main class="main-content" dir="rtl">
        <div class="container">
            <div class="page">
                <div class="breadcrumbs" dir="ltr">
                    <a href="{{url('/')}}">خانه</a>
                    <a href="{{url('/review')}}">فیلم</a>
                    <span>{{$movie[0]->name}}</span>
                </div>

                <div class="content" style="direction: rtl">
                    <div class="row">
                        <div class="col-md-6">

                            <figure class="movie-poster"><img style="height: 430px;width: 100%" src="{{asset('images/'.$movie[0]->image)}}" alt="#"></figure>

                        </div>
                        <div class="col-md-6">
                            <h2 class="movie-title">{{$movie[0]->name}}</h2>
                            <div class="movie-summary" style="word-break: break-all">
                                <p>{{$movie[0]->summary}} </p>
                            </div>
                            <ul class="movie-meta">
                                <li><strong>امتیاز:</strong>
                                    {{$movie[0]->rate}}
                                </li>
                                <li><strong>مدت زمان:</strong> {{$movie[0]->trailler}} </li>
                                <li><strong>تاریخ تولید:</strong> {{$movie[0]->p_year}}</li>
                                <li><strong>دسته بندی:</strong> {{$movie[0]->janre}}</li>
                            </ul>

                            <ul class="starring">
                                <li><strong>کارگردان:</strong> {{$movie[0]->director}}</li>
                                <li><strong>بازیگران برجسته:</strong> {{$movie[0]->actors}}</li>
                            </ul>
                        </div>
                    </div> <!-- .row -->

                </div>
            </div>
        </div> <!-- .container -->
        <div style="margin-right: 12%;margin-top: 30px;color: white"><h2>دیدگاه ها</h2></div>
        @if($comments)
        @foreach($comments as $comment)
        <div style="margin-right: 12%">


            <div  style="border-radius: 10px;height: auto;width: 300px;margin: 30px;background-color: rgb(183 217 209);word-break: break-all;padding: 5px;">
                <div style="height: 30px;width: 50%;display: flex;align-items: baseline">
                  <i class="fa fa-comment"  style="color: white"></i><h4 style="margin-right: 10px;color: white">
                    {{$comment->name}}</h4>
                </div>
                <p style="color: white">{{$comment->comment}}</p>

            </div>



        </div>
        @endforeach
        @endif
    </main>
@endsection
