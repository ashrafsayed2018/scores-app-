
@extends('layouts.app')

@section('content')
<div class="container lg:w-2/3 mx-auto">
    <h1 class="text-center mb-5 text-lg">مرحبا بك في صفحة المقالات </h1>

    @foreach ($posts as $post)

<div class="card bg-white lg:w-full mb-5 shadow-lg border border-gray-400 p-5">
   <a href="{{ route('post.show',$post) }}">
        <h2 class="mb-3">{{ $post->title }}</h2>
        <hr>
        <p class="mb-5">{{ $post->description }}</p>
        <img src="{{ asset('storage/post_images/'. $post->images) }}" alt="{{ $post->title }}" style="width: 100%;height:100px">
    </a>
    <div class="flex justify-between mt-6">
        <div> posted since: {{ $post->created_at->diffForHumans(null, true) }}</div>
        <div class="flex items-center">

         @if ($post->isLikedBy(auth()->user(),'App\Post'))
         <form action="/post/{{ $post->id }}/dislike" method="POST">
              @method('DELETE')
             @csrf
             <button type="submit" class="focus:outline-none">
              <i class="fa fa-heart liked"></i>
             </button>
         </form>
         @else
         <form action="/post/{{ $post->id }}/like" method="POST">
              @csrf
              <button type="submit" class="focus:outline-none">
                  <i class="far fa-heart"></i>
              </button>
          </form>
         @endif
         <span class="likes text-xs text-gray-500 mr-3">
             {{ $post->likes ? : 0 }}
         </span>

     </div>

    </div>
</div>

@endforeach


    <a href="/home" class="button button-green">رجوع</a>
</div>

@endsection
