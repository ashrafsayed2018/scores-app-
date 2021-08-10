@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card bg-white lg:mx-auto lg:w-1/2 shadow-lg rounded-lg p-10">
        <div class="card-header text-center text-red-500 text-2xl">اعادة تعيين الرقم السري</div>

        <div class="card-body">
            @if (session('status'))
                <div class="bg-green-500 text-white p-3 mb-5 rounded-l-2xl" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="w-full ">
                    <label for="email" class="w-full block mb-5">{{ __('البريد الالكتروني') }}</label>

                    <div class="">
                        <input id="email" type="email" class="w-full p-2 outline-none border-2 border-gray-200 rounded-3xl @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback text-red-500 mt-5 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-0">
                    <div class="">
                        <button type="submit" class="button button-green mt-10">
                            {{ __('ارسال رابط تعيين الرقم السري') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
