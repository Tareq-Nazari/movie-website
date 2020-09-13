@extends('master.guest')
@section('content')
    <div class="reg-main">
        <div class="reg-container" id="rcontainer">

            <div class="reg-form-container reg-sign-in-container">
                <form class="reg-form" action="{{route('register')}}" method="POST">
                    @csrf
                    <h1 class="reg-h1">ثبت نام</h1>

                    <div>
                        <x-jet-label value="Name" />
                        <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label value="Email" />
                        <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label value="Password" />
                        <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label value="Confirm Password" />
                        <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <button class="reg-button" type="submit">ثبت نام</button>
                </form>
            </div>
            <div class="reg-overlay-container">
                <div class="reg-overlay">

                    <div class="reg-overlay-panel reg-overlay-right">
                        <h1 class="reg-h1">خوش اومدی دوست من</h1>
                        <p class="reg-p">از اینجا میتونی وارد پنل خودت بشی</p>
                        <button class="reg-button ghost" id="rsignUp"><a style="text-decoration: none" href="{{url('/login')}}">ورود</a> </button>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
