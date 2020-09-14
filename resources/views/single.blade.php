@extends('master/guest')
@section('content')

    @if ($errors->any())
        <div id="alert" class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <div class="main-content" dir="rtl">
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

            <div style="width: 76%;margin-top: 30px;height: 100px;background-color: white;margin-right: 12%;border-radius: 7px;display: flex;justify-content: space-evenly;align-items: center">
                <form method="post" style="display: flex" action="{{url('user/addComment')}}">
                    @csrf
                    <label>دیدگاه شما : </label>
                    <input type="hidden" name="movie_id" value="{{$movie[0]->id}}">
                    <input name="comment" style="height: 30px" type="text"><button class="btn btn-primary" style="height: 30px" type="submit">ثبت دیدگاه</button>
                </form>

                <form style="display: flex" method="post" action="{{url('user/addRate')}}">
                    @csrf
                    <label>امتیاز شما به این فیلم : </label>
                    <input type="hidden" name="movie_id" value="{{$movie[0]->id}}">
                    <input name="rate" placeholder="از ده" style="height: 30px" type="number" step="0.01" max="10" min="0"><button class="btn btn-primary" style="height: 30px" type="submit">ثبت امتیاز</button>
                </form>
            </div>

<div style="margin-right: 12%;background-color: #FFFFFF;width: 76%;border-radius: 10px;display: flex;flex-wrap: wrap;margin-top: 30px">
        @if($comments)
        @foreach($comments as $comment)

        <div style="">


            <div  style="border-radius: 10px;height: auto;width: 300px;margin: 5px;background-color: rgb(161 161 161 / 48%);word-break: break-all;padding: 5px;">
                <div style="height: 30px;width: 50%;display: flex;align-items: baseline">
                  <i class="fa fa-comment"  style="color: green"></i><h4 style="margin-right: 10px;color: black">
                    {{$comment->name}}</h4>
                </div>
                <p style="color: black">{{$comment->comment}}</p>

            </div>



        </div>
        @endforeach
        @endif
    </div>
    </main>
@endsection
