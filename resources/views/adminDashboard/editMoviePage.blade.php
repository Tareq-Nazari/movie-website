@extends('master.admin')
@section('content')
<!-- /. NAV SIDE  -->





        <form role="form" dir="rtl">
            <div class="form-group">

                <div class="">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                        <div>
                            <span class="btn btn-file btn-success"><span class="fileupload-new">انتخاب عکس</span><span class="fileupload-exists">تغییر</span><input type="file"></span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">حذف</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>اسم فیلم</label>
                <input class="form-control" type="text">

            </div>
            <div class="form-group">
                <label>مدت زمات(دقیقه)</label>
                <input class="form-control" type="text">

            </div>
            <div class="form-group">
                <label>کارگردان</label>
                <input class="form-control" type="text">

            </div>
            <div class="form-group">
                <label>نویسنده</label>
                <input class="form-control" type="text">

            </div>
            <div class="form-group">
                <label>ستارگان</label>
                <input class="form-control" type="text">

            </div>
            <div class="form-group">
                <label>خلاصه داستان</label>
                <textarea class="form-control" rows="3"></textarea>
            </div>


            <button type="submit" class="btn btn-info">ثبت </button>

        </form>







APPER  -->

<!-- /. WRAPPER  -->


<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
@endsection
