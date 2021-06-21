@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bg-white mx-auto shadow-lg lg:w-1/3 p-5  rounded-lg">
        <div class="col-md-8">
            <div class="card">
                <div class="text-lg font-bold text-center">تسجيل الدخول للموقع</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="w-full">
                            <label for="username" class="block font-bold mb-2">اسم المستخدم</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="block w-full @error('username') is-invalid @enderror border border-gray-500 hover:border-none hover:outline-none focus:outline-none focus:ring-2 focus:ring-indigo-400 rounded-md px-2 py-2" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="block font-bold mb-2">البريد الالكتروني</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="block w-full @error('email') is-invalid @enderror border border-gray-500 hover:border-none hover:outline-none focus:outline-none focus:ring-2 focus:ring-indigo-400 rounded-md px-2 py-2" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="block font-bold mb-2">الرقم السري</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="block w-full @error('password') is-invalid @enderror border border-gray-500 hover:border-none hover:outline-none focus:outline-none focus:ring-2 focus:ring-indigo-400 rounded-md px-2 py-2" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="block font-bold mb-2">تأكيد الرقم السري</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="block w-full border border-gray-500 hover:border-nonehover:outline-none focus:outline-none focus:ring-2 focus:ring-indigo-400 rounded-md px-2 py-2" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="mt-5">
                                <button type="submit" class="button button-green">
                                   تسجيل
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
