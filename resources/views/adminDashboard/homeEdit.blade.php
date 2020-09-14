@extends('master.admin')
@section('content')
    <div dir="rtl">
        <h1>اسلایدر</h1>
        <hr>
        <div style="display: flex;justify-content: space-evenly;align-items: center">
            <form method="post" action="{{route('edit_home_movie')}}  " enctype="multipart/form-data">
                @csrf
                <div>
                    <h3>اسلاید اول</h3>
                    <label>آیدی فیلم
                        <input name="name1" class="form-control" type="number"></label>
                    <button style="justify-self: flex-start" type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>
            <form method=post action="{{route('edit_home_movie')}} " enctype="multipart/form-data">
                @csrf
                <div>
                    <h3>اسلاید دوم</h3>
                    <label>آیدی فیلم
                        <input name="name2" class="form-control" type="number"></label>
                    <button style="justify-self: flex-start" type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>
            <form method="post" action="{{route('edit_home_movie')}} " enctype="multipart/form-data">
                @csrf
                <div>
                    <h3>اسلاید سوم</h3>
                    <label>آیدی فیلم
                        <input name="name3" class="form-control" type="number"></label>
                    <button style="justify-self: flex-start" type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>

        </div>
        <br>
        <br>
        <h1>راست</h1>
        <hr>
        <div style="display: flex;justify-content: space-evenly;align-items: center">
            <form method="post" action="{{route('edit_home_movie')}} " enctype="multipart/form-data">
                @csrf
                <div>
                    <h3>عکس اول</h3>
                    <label>آیدی فیلم
                        <input name="name4" class="form-control" type="number"></label>
                    <button style="justify-self: flex-start" type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>
            <form>

                <div>
                    <h3>عکس دوم</h3>
                    <label>آیدی فیلم
                        <input name="name5" class="form-control" type="number"></label>
                    <button style="justify-self: flex-start" type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>
            <form method="post" action="{{route('edit_home_movie')}} " enctype="multipart/form-data">
                @csrf
                <div>
                    <h3>عکس سوم</h3>
                    <label>آیدی فیلم
                        <input name="name6" class="form-control" type="number"></label>
                    <button style="justify-self: flex-start" type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>
        </div>

        <br>
        <br>
        <h1>پایین</h1>
        <hr>

        <div style="display: flex;justify-content: space-evenly;align-items: center">
            <form method="post" action="{{route('edit_home_movie')}} " enctype="multipart/form-data">
                @csrf
                <div>
                    <h3>عکس اول</h3>
                    <label>آیدی فیلم
                        <input name="name7" class="form-control" type="number"></label>
                    <button style="justify-self: flex-start" type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>
            <form method="post" action="{{route('edit_home_movie')}} " enctype="multipart/form-data">
                @csrf
                <div>
                    <h3>عکس دوم</h3>
                    <label>آیدی فیلم
                        <input name="name8" class="form-control" type="number"></label>
                    <button style="justify-self: flex-start" type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>
            <form method=post action=" {{route('edit_home_movie')}}" enctype="multipart/form-data">
                @csrf
                <div>
                    <h3>عکس سوم</h3>
                    <label>آیدی فیلم
                        <input name="name9" class="form-control" type="number"></label>
                    <button style="justify-self: flex-start" type="submit" class="btn btn-success">ثبت</button>
                </div>
            </form>

        </div>


    </div>
@endsection
