@extends('master.admin')
@section('content')
<!-- /. NAV SIDE  -->



@if ($errors->any())
    <div id="alert" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
@if(session('success1'))

    <div class="alert alert-success" role="alert">
        {{session('success1')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif


        <form method="post" action="{{route('add_film')}}" enctype="multipart/form-data" dir="rtl">
            @csrf
            <div class="form-group">

                <div class="">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                        <div>
                            <span class="btn btn-file btn-success"><span class="fileupload-new">انتخاب عکس</span><span class="fileupload-exists">تغییر</span><input name="image" type="file"></span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">حذف</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>اسم فیلم</label>
                <input  name="name" class="form-control" type="text">

            </div>
            <div  class="form-group">
                <label>مدت زمات(دقیقه)</label>
                <input name="trailler" class="form-control" type="number">

            </div>
            <div  class="form-group">
                <label>کارگردان</label>
                <input name="director" class="form-control" type="text">

            </div>

            <div  class="form-group">
                <label>ستارگان</label>
                <input name="actors" class="form-control" type="text">

            </div>
            <div  class="form-group">
                <label>محصول کشور :</label>
                <input name="product" class="form-control" type="text">

            </div>
            <div  class="form-group">
                <label>سال ساخت</label>
                <input name="p_year" class="form-control" type="number">

            </div>
            <div  class="form-group">
                <label>زبان</label>
                <select name="language">
                    <option value="فارسی">فارسی</option>
                    <option value="انگلیسی">انگلیسی</option>
                </select>
            </div>
            <div  class="form-group">
                <label> ژانرفیلم</label>
                @foreach($cats as $cat)
                    <input name="janre[]" type="checkbox" value="{{$cat->name}}">{{$cat->name}}</input></br>
                @endforeach

            </div>
            <div class="form-group">
                <label>خلاصه داستان</label>
                <textarea name="summary" class="form-control" rows="3"></textarea>
            </div>


            <button type="submit" class="btn btn-info">ثبت </button>

        </form>








<!-- /. PAGE WRAPPER  -->

<!-- /. WRAPPER  -->


<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
@endsection
