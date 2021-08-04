@extends('layouts.app')

@section('content')
<div class="container mt-32">
    <div class="bg-white mx-auto shadow-lg lg:w-1/3 p-5  rounded-lg">
        <div class="col-md-8">
            <div class="card">
                <div class="text-lg text-center">الدخول للموقع</div>
                <a href="{{ url('auth/google') }}"  class="flex justify-between  items-center w-1/2 my-1 mx-auto py-2 px-4 text-white rounded-md mb-3 transition-all hover:shadow-md bg-red-600 text-center">
                    <strong>دخول بحساب جوجل</strong>
                    <i class="fab fa-google text-white mt-1"></i>
                </a>
                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="w-full">
                            <label for="email" class="block font-bold mb-2">البريد الالكتروني</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                class="block w-full @error('email') is-invalid @enderror hover:outline-none focus:outline-none focus:ring-2 focus:ring-indigo-400 rounded-md px-2 py-2"
                                name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full">
                            <label for="password" class="block font-bold mb-2">الرقم السري</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                class="block w-full @error('password') is-invalid @enderror border border-full hover:outline-none focus:outline-none focus:ring-2 focus:ring-indigo-400 rounded-md px-2 py-2"
                                name="password"
                                required
                                autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                       تذكرني
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="w-full mb-0 mt-4">
                            <div class="flex justify-between items-baseline">
                                <button type="submit" class="button button-green">
                                    دخول
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                       نسيت الرقم السري !
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="w-full mt-5">
                            <a href="{{ route('register') }}"> ليس لديك حساب تسجيل حساب جديد</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
