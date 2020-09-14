@extends('master/admin')
@section('content')


        <div style="display: flex" dir="rtl">

            <input style="width: 300px" type="text" class="form-control" placeholder="افزودن ژانر" aria-label="" aria-describedby="basic-addon1">
            <button class="btn btn-primary" type="button">افزودن</button>

        </div>
        <br><br>
    <div style="display: flex;flex-wrap: wrap;width: 80%;padding: 10px;margin-left: 10%" dir="rtl">
        @for($i=0;$i<50;$i++)
        <div style="display: flex;margin: 5px;justify-content: space-between;border-radius: 12px;padding-left: 12px;padding-right: 12px;align-items: center;border: solid rgba(0,0,0,0.43) 1px"> <span class="fa fa-close" style="color: red;font-size: 1em"></span>&nbsp;<h4><strong>ژانر</strong></h4> </div>
        @endfor
    </div>




@endsection
