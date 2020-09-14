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
                        <div style="display: grid;grid-template-columns: 1fr">

                            <div style="display: grid;grid-template-columns: 1fr 1fr 1fr">
                                <div class="input-field">
                                    <div class="input-select">انتخاب ژانرفیلم :
                                        <select data-trigger="" name="janre">
                                            @foreach($cats as $cat)
                                                <option value="{{$cat->name}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div  style="display: grid;grid-template-columns: 1fr "  class="input-field">
                                    <label style="color: white;margin-bottom: 2px">سال ساخت : </label>
                                    <input style="height: 50px;width: 100px" placeholder="مثال 1998" type="text" name="p_year">
                                </div>
                                <div   style="display: grid;grid-template-columns: 1fr " class="input-field">
                                    <label style="color: white;margin-bottom: 2px"> محصول : </label>
                                    <input style="height: 50px;width: 100px" type="text" name="product">
                                </div>
                            </div>
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
                    </div>
            </form>

        </div>

    </div>
@endsection
