@extends('master.guest')
@section('content')
    <div
        style="width: 100%;background-image: url({{asset('images/b-m.jpg')}}) ;display: flex;flex-direction: column;justify-content: space-evenly"
        dir="rtl">
        <div
            style="margin-right: 37%;border-radius: 45px;padding: 5px;width: 24%;background-color: rgba(243,29,33,0.85)">
            <h1 style="color: white">داستان فیلمی رو که میخوای بنویس</h1></div>

        <div class="s008">
            <form method="post" action="{{route('search_form')}}">
                @csrf
                <div class="inner-form">
                    <div class="basic-search">
                        <div class="input-field">
                            <input name="name" id="search" type="text" placeholder="اسم فیلم"/>
                            <div class="icon-wrap">

                            </div>
                        </div>
                    </div>
                    <div class="basic-search">
                        <div class="input-field">
                            <input name="summary" id="search" type="text" placeholder="   خلاصه فیلم"/>
                            <div class="icon-wrap">

                            </div>
                        </div>
                    </div>
                    <div class="advance-search">
                        <span class="desc">جستجوی پیشرفته</span>


                            <div style="" class="row first">
                                <div class="input-field">
                                    <button type="button" class="btn btn-warning" style="" onclick="showJanre()">انتخاب ژانر</button>
                                </div>
                                <div  style=""  class="input-field">
                                    <label style="color: white;margin-bottom: 2px">سال ساخت : </label>
                                    <input style="height: 100%;width: 50%;padding: 10px"  placeholder="مثال 1998" type="text" name="p_year">
                                </div>
                                <div   style="" class="input-field">
                                    <label style="color: white;margin-bottom: 2px"> کشور : </label>
                                    <input style="height: 100%;width: 50%;padding: 10px" type="text" name="product">
                                </div>
                            </div>
                        <div id="janre" style="visibility: hidden;width: 100%;background-color: white;padding: 5px;display: flex;flex-wrap: wrap">
                            @foreach($cats as $cat)
                           <label style="margin: 0 20px">{{$cat->name}}
                               <input class="" type="checkbox">
                           </label>

                            @endforeach

                        </div>

                        <br>
                            <div class="row second">
                                <div class="input-field" style="width: 67px">
                                    <label style="color: white;margin-bottom: 2px">امتیاز : </label>

                                </div>
                                <div class="input-field" style="width: 150px">

                                    <input type="number" style="height: 30px;width: 120px;padding: 1px 1px 1px 1px"
                                           placeholder="از">
                                </div>

                                <div class="input-field">
                                    <input type="number" style="height: 30px;width: 120px;padding: 1px 1px 1px 1px"
                                           placeholder="تا">


                                </div>
                            </div>
                            <div class="row third">
                                <div class="input-field">
                                    <div class="result-count">
                                        <span>1 </span>نتیجه
                                    </div>
                                    <div class="group-btn">

                                        <button class="btn-search">جستجو</button>
                                    </div>
                                </div>
                            </div>

                    </div>
            </form>

        </div>

    </div>
    <div style="background-color: white;width: 100%;display: flex;flex-wrap: wrap;padding: 20px">
        @for($i=0;$i<10;$i++)
            <div class="card" style="width: 18rem;margin: 25px">
                <img class="card-img-top" style="height: 150px;width: 150px" src="{{asset('images/baelen.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-danger">مشاهده فیلم</a>
                </div>
            </div>
        @endfor
    </div>
    <script>
       function showJanre(){

            let x = document.getElementById('janre')
           if(x.style.visibility === 'hidden'){
               x.style.visibility = 'visible'
           } else x.style.visibility = 'hidden'
        }
    </script>
@endsection
