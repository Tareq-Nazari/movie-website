@extends('master.guest')
@section('content')
<div class="reg-main">

    <div class="reg-container" id="rcontainer">
        <div class="reg-form-container reg-sign-in-container">
            <form class="reg-form" method="POST" action="{{route('login')}}">
                @csrf
                <h1 class="reg-h1">ورود</h1>

                <div>
                    <x-jet-label value="Email" />
                    <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label value="Password" />
                    <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <button class="reg-button">ورود</button>
            </form>
        </div>
        <div class="reg-overlay-container">
            <div class="reg-overlay">
                <div class="reg-overlay-panel reg-overlay-right">
                    <h1 class="reg-h1">سلام دوست من</h1>
                    <p class="reg-p">اگه اکانت نداری ثبت نام کن و با ما وارد سفر به دنیای فیلم شو</p>
                    <button class="reg-button ghost" id="rsignUp"><a style="text-decoration: none;color: white" href="{{url('/register')}}">ثبت نام</a> </button>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
