@extends('master/admin')
@section('content')

    <div style="display: flex" dir="rtl">
        <form action="{{route('add_category')}}" method="post">
            @csrf
            <input style="width: 300px" name="name" type="text" class="form-control" placeholder="افزودن ژانر"
                   aria-label="" aria-describedby="basic-addon1">
            <button class="btn btn-primary" type="submit">افزودن</button>
        </form>
    </div>
    <br><br>
    <div style="display: flex;flex-wrap: wrap;width: 80%;padding: 10px;margin-left: 10%" dir="rtl">
        @foreach($categories as $cat )
            <div
                style="display: flex;margin: 5px;justify-content: space-between;border-radius: 12px;padding-left: 12px;padding-right: 12px;align-items: center;border: solid rgba(0,0,0,0.43) 1px">
               <a href="{{url('dashboard/admin/deleteCategory'.$cat->id)}}"> <span class="fa fa-close" style="color: red;font-size: 1em"></span></a>&nbsp;<h4><strong>{{$cat->name}}</strong></h4>
            </div>
        @endforeach
    </div>




@endsection
