
@extends('layouts.app')

@section('content')
<div class="container lg:w-4/5 mx-auto">
    <h1 class="text-center mb-5 text-lg">مرحبا بك في صفحة المقالات </h1>
    <div class="grid lg:grid-cols-12 lg:gap-5">
    @foreach ($posts as $post)

    <livewire:post-card :post="$post" :key="$post->id" />

    @endforeach
    </div>

    <a href="/home" class="button button-green">رجوع</a>
</div>

@endsection
