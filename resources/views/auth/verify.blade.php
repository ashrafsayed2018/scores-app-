@extends('layouts.app')

@section('content')
<div class="container mt-36">
    <h1 class="text-center text-red-500 text-2xl my-10">التحقق من البريد الالكتروني </h1>
    <div class="card bg-white p-10 lg:mx-auto lg:w-2/4 shadow-lg rounded-lg">
         <div class="card-body">
            @if (session('resent'))
            <div class="bg-red-500 text-white p-4 rounded-sm mb-10" role="alert">
                {{ __('ارسلنا لك رابط تحقق على البريد الالكتروني .') }}
            </div>
            @endif
            {{ __('قبل المتابعه الرجاء فحص رابط التحقق في بريدك الالكتروني ') }}
            {{ __('اذا لم يتم ارسال على بريدك الالكتروني') }},
            <form class="block mt-10" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="button button-green p-0 m-0 align-baseline">{{ __('اضغط هنا لارسال رابط تحقق على بريدك الالكتروني') }}</button>.
            </form>
         </div>
    </div>
</div>
@endsection
