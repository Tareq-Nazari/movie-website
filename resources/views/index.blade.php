@extends('master.guest')
@section('content')

    <main class="main-content">
        <div class="container">
            <div class="page">
                <div class="row">
                    <div class="col-md-9">
                        <div class="slider">
                            <ul class="slides">
                                @foreach($movies as $movie)
                                    @if($movie->status==='1')
                                        <li><a href="{{url('detail'.$movie->id)}}"><img
                                                    src="{{url('/images/'.$movie->image)}}" alt="Slide 1"></a></li>
                                    @endif
                                @endforeach
                                @foreach($movies as $movie)
                                    @if($movie->status==='2')

                                        <li><a href="{{url('detail'.$movie->id)}}"><img
                                                    src="{{url('/images/'.$movie->image)}}" alt="Slide 1"></a></li>
                                    @endif
                                @endforeach
                                @foreach($movies as $movie)
                                    @if($movie->status==='3')

                                        <li><a href="{{url('detail'.$movie->id)}}"><img
                                                    src="{{url('/images/'.$movie->image)}}" alt="Slide 1"></a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <div class="latest-movie">
                                    @foreach($movies as $movie)
                                        @if($movie->status==='4')

                                            <a href="{{url('detail'.$movie->id)}}"><img
                                                    src="{{url('/images/'.$movie->image)}}"
                                                    alt="Movie 1"></a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12">
                                <div class="latest-movie">
                                    @foreach($movies as $movie)
                                        @if($movie->status==='5')
                                            <a href="{{url('detail'.$movie->id)}}"><img
                                                    src="{{url('/images/'.$movie->image)}}"
                                                    alt="Movie 2"></a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- .row -->
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="latest-movie">
                            @foreach($movies as $movie)
                                @if($movie->status==='6')
                                    <a href="{{url('detail'.$movie->id)}}"><img  src="{{url('/images/'.$movie->image)}}"
                                                                                 alt="Movie 3"></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="latest-movie">
                            @foreach($movies as $movie)
                                @if($movie->status==='7')
                                    <a href="{{url('detail'.$movie->id)}}"><img  src="{{url('/images/'.$movie->image)}}"
                                                                                 alt="Movie 4"></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="latest-movie">
                            @foreach($movies as $movie)
                                @if($movie->status==='8')
                                    <a href="{{url('detail'.$movie->id)}}"><img  src="{{url('/images/'.$movie->image)}}"
                                                                                 alt="Movie 5"></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="latest-movie">
                            @foreach($movies as $movie)
                                @if($movie->status==='9')
                                    <a href="{{url('detail'.$movie->id)}}"><img  src="{{url('/images/'.$movie->image)}}"
                                                                                 alt="Movie 6"></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div> <!-- .row -->

                <div class="row">
                    <div class="col-md-4">
                        <h2 class="section-title">December premiere</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore.</p>
                        <ul class="movie-schedule">
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                        </ul> <!-- .movie-schedule -->
                    </div>
                    <div class="col-md-4">
                        <h2 class="section-title">November premiere</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore.</p>
                        <ul class="movie-schedule">
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                        </ul> <!-- .movie-schedule -->
                    </div>
                    <div class="col-md-4">
                        <h2 class="section-title">October premiere</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore.</p>
                        <ul class="movie-schedule">
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                            <li>
                                <div class="date">16/12</div>
                                <h2 class="entry-title"><a href="#">Perspiciatis unde omnis</a></h2>
                            </li>
                        </ul> <!-- .movie-schedule -->
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </main>
@endsection
