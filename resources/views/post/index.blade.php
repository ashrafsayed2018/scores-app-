
@extends('layouts.app')

@section('content')
<div class="container lg:w-4/5 mx-auto px-10 lg:px-0 ">
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

    <h1 class="text-center mb-5 text-lg my-8">احدث الاعلانات </h1>
    <div class="grid lg:grid-cols-12 lg:gap-5">
    @foreach ($posts as $post)
    <livewire:post-card :post="$post" :key="$post->id" />
    @endforeach
    </div>
</div>

@endsection
