@extends('layouts.app')

@section('content')
<div class="favorites w-4/5 mx-auto my-8">
    <h1 class="text-center my-6 lg:text-3xl">صفحة المفضله الخاصه بك</h1>
    <ul>
        @foreach ($post_array as $post)
                <li class="bg-green-100 border-2 hover:border-green-400 py-7 xs:text-sm px-3 mb-3 rounded-lg gap-x-2">

                  اضفت اعلان <a href="{{ route('post.show', $post->slug) }}">{{  $post->title }}</a> للمفضله
               </li>
        @endforeach
    </ul>
</div>

@endsection