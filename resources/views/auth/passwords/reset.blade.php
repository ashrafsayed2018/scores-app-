@extends('layouts.app')

@section('content')
<div class="container " style="margin-top: 150px">

    <div class="card bg-white lg:mx-auto lg:w-2/4 shadow-lg rounded-3xl pt-4">
        <div class="card-header text-center text-2xl">{{ __('اعادة تعيين الرقم السري') }}</div>

        <div class="card-body w-full p-4">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="w-full mb-5">
                    <label for="email" class="w-full block mb-5">{{ __('البريد الالكتروني') }}</label>

                        <input id="email" type="email" class="w-full p-2 outline-none border-2 border-gray-300 rounded-3xl @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="text-right">{{ __('الرقم السري') }}</label>

                    <input id="password" type="password" class="w-full p-2 outline-none border-2 border-gray-300 rounded-3xl @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="mb-5">
                    <label for="password-confirm" class="text-right">{{ __('تأكيد الرقم السري') }}</label>

                    <input id="password-confirm" type="password" class="w-full p-2 outline-none border-2 border-gray-300 rounded-3xl" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="button button-green">
                            {{ __('اعادة تعيين ') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
