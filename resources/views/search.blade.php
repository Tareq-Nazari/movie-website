@extends('master.guest')
@section('content')
<div style="width: 100%;background-image: url({{asset('images/b-m.jpg')}}) ;display: flex;flex-direction: column;justify-content: space-evenly" dir="rtl">
    <div style="margin-right: 37%;border-radius: 45px;padding: 5px;width: 24%;background-color: rgba(243,29,33,0.85)"><h1 style="color: white">داستان فیلمی رو که میخوای بنویس</h1></div>

    <div class="s008">
        <form >
            <div class="inner-form">
                <div class="basic-search">
                    <div class="input-field">
                        <input  id="search" type="text" placeholder="اسم یا داستانو بنویس" />
                        <div class="icon-wrap">

                        </div>
                    </div>
                </div>
                <div class="advance-search">
                    <span class="desc">جستجوی پیشرفته</span>
                    <div class="row">
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">ACCESSORIES</option>
                                    <option>ACCESSORIES</option>
                                    <option>SUBJECT B</option>
                                    <option>SUBJECT C</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select  name="choices-single-defaul">
                                    <option placeholder="" value="">رنگ</option>
                                    <option>سبز</option>
                                    <option>آبی</option>
                                    <option>قرمز</option>
                                    <option>بنفش</option>
                                    <option>سفید</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select name="choices-single-defaul">
                                    <option placeholder="" value="">سایز</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                    <option>XXL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row second">
                        <div class="input-field" style="width: 67px">
                            <label style="color: white;margin-bottom: 2px">قیمت : </label>

                        </div>
                        <div class="input-field" style="width: 150px">

                            <input type="number" style="height: 30px;width: 120px;padding: 1px 1px 1px 1px" placeholder="از">
                        </div>

                        <div class="input-field">
                            <input type="text" style="height: 30px;width: 120px;padding: 1px 1px 1px 1px"  placeholder="تا">


                        </div>
                    </div>
                    <div class="row third">
                        <div class="input-field">
                            <div class="result-count">
                                <span>1 </span>نتیجه </div>
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
