@extends('master.admin')
@section('content')
    <div style="margin-right: 12%;background-color: #FFFFFF;width: 100%;border-radius: 10px;display: flex;flex-wrap: wrap;" dir="rtl">

        @for($i = 0;$i<20;$i++)
            <form id="x">
                <div  style="border-radius: 10px;height: auto;width: 260px;margin: 10px;background-color: rgb(161 161 161 / 48%);word-break: break-all;padding: 5px;position: relative">
                    <div style="height: 30px;width: 50%;display: flex;align-items: baseline">
                        <i class="fa fa-comment"  style="color: green"></i><h4 style="margin-right: 10px;color: black">
                            نام کاربر</h4>
                    </div>
                    <p style="color: black">متن </p>
                    <i class="fa fa-close" style="color: red;position: absolute;bottom: 5px;cursor: pointer;left: 5px" onclick="document.getElementById('x').submit()"></i>
                </div>
            </form>

        @endfor





    </div>
@endsection
