@extends('master/guest')
@section('content')
    <main class="main-content">

        <div class="container">
            <div class="page">
                <div class="breadcrumbs">
                    <a href="{{url('/')}}">خانه</a>
                    <span>فیلم ها</span>
                </div>

                <div class="movie-list" dir="rtl">
                    @foreach($movies as $movie)
                    <div class="movie">
                        <figure class="movie-poster"><img src="{{asset('images/'.$movie->image)}}" style="width: 200px;height: 200px" alt="#"></figure>
                        <div class="movie-title"><a href="{{url('/detail'.$movie->id)}}">{{$movie->name}}</a></div>
                        <p>{{substr($movie->summary,0,20).'...'}}</p>
                    </div>
                    @endforeach


                </div> <!-- .movie-list -->

                <div class="pagination">

                   {{$movies->links()}}

                </div>
            </div>
        </div> <!-- .container -->
    </main>
@endsection
