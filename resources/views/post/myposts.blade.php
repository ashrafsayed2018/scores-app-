@extends('layouts.app')
@section('content')
   <div class="container w-4/5 mx-auto my-8">
       <h1 class="text-center my-8">اعلاناتي</h1>
       <ul class="lg:w-1/2">
           @forelse ($user_posts as $post)
               <li class="text-right bg-red-500 text-white text-lg py-2 pr-2 mb-4 rounded-lg shadow-lg">
                   <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
               </li>
            @empty
            <li class="text-right bg-red-500 text-white text-lg py-2 pr-2 mb-4 rounded-lg shadow-lg">لم ترفع اي اعلان </li>
           @endforelse
       </ul>
   </div>
@endsection
