@extends('layouts.app')

@section('content')
<div class="container lg:w-4/5 mx-auto">
    <div class="flex justify-between items-center mt-4 w-full">
        <a href="{{ route('home') }}" class="text-xs text-gray-500">
            <i class="fa fa-arrow-right"></i>
            <span>الرجوع</span>
        </a>
        <div class="text-sm text-gray-500 felx justify-between items-center">
            <a href="/home">الرئيسيه</a>
            /
            <a href="">الفئات</a>
            /
            <a href="">محركات</a>
        </div>
    </div>
    <h1 class="text-center text-lg my-8 font-bold">انشر اعلانك  </h1>
    @livewire('create-post-form')
</div>

@endsection

