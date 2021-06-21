@extends('layouts.app')

@section('content')
<div class="container lg:w-2/3 mx-auto">
    <div class="card bg-white lg:w-full mb-5 shadow-lg border border-gray-400 p-5">
         <h2 class="mb-3">{{ $post->title }}</h2>
         <hr>
         <p class="mb-5">{{ $post->description }}</p>
         <img src="{{ asset('storage/post_images/'.$post->images) }}" alt="{{ $post->title }}" style="width: 100%;height:300px">
         <div class="flex justify-between mt-6">
             <div> نشر منذ: {{ $post->created_at->diffForHumans(null, true) }}</div>
             <div class="flex items-center">
                <livewire:post-likes :post="$post" :wire:key="$post->id">
             </div>

         </div>
    </div>

     @include('comment.create')

     @include('comment.show')


    <a href="/home" class="button button-green">رجوع</a>


</div>

@endsection
