@extends('master.admin')
@section('content')
<!-- /. NAV SIDE  -->




@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>{{session('error')}}</h1>
        <form method="post" enctype="multipart/form-data" action="{{route('edit_film')}}" dir="rtl">
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
                <input name="name" class="form-control" type="text">

            </div>
            <div class="form-group">
                <label>مدت زمات(دقیقه)</label>
                <input name="trailler" class="form-control" type="number">

            </div>
            <input type="hidden" name="id" value="{{$movie->id}}">
            <div class="form-group">
                <label>کارگردان</label>
                <input name="director" class="form-control" type="text">

            </div>
            <div class="form-group">
                <label>ستارگان</label>
                <input name="actors" class="form-control" type="text">

            </div>
            <div class="form-group">
                <label>خلاصه داستان</label>
                <textarea  name="summary" class="form-control" rows="3"></textarea>
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


            <button type="submit" class="btn btn-info">ثبت </button>

        </form>







APPER  -->

<!-- /. WRAPPER  -->


<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
@endsection
