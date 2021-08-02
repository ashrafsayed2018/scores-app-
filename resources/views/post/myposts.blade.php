
@extends('layouts.app')

@section('content')
<div class="container lg:w-4/5 mx-auto mt-36">
    <h1 class="text-center mb-5 text-3xl">اعلاناتي </h1>
    <div class="grid lg:grid-cols-12 lg:gap-5">
    @forelse ($user_posts as $post)

    <livewire:post-card :post="$post" :key="$post->id" />
    @empty
    <div class="bg-red-500 text-center text-white text-2xl p-5 col-span-12">لم تنشر اي اعلان حتى الان</div>
    @endforelse
    </div>
</div>

@endsection
