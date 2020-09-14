@extends('master.admin')
@section('content')



<div style="display: flex;flex-wrap: wrap;width: 100%" dir="rtl">
    @for($i=0;$i<50;$i++)
    <div class="card" style="width: 18rem;margin: 5px">
        <img class="card-img-top" src="{{asset('images/farid.jpg')}}" style="height: 150px;width: 150px" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">ویرایش</a><a href="# " style="margin-right: 3px" class="btn btn-danger">حذف</a>
        </div>
    </div>
    @endfor
</div>


@endsection
