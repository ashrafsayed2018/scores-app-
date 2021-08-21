@extends('layouts.app')

@section('content')
<div class="favorites w-4/5 mx-auto my-36">
    <h1 class="text-center my-6 lg:text-3xl">صفحة المفضله الخاصه بك</h1>
    <ul class="text-right">
        @forelse ($post_array as $post)
                <li class="bg-green-100 border-2 hover:border-green-400 py-7 xs:text-sm px-3 mb-3 rounded-lg gap-x-2">

                  اضفت اعلان <a href="{{ route('post.show', [$post->slug,$post->id]) }}">{{  $post->title }}</a> للمفضله
               </li>
        @empty
        <div class="bg-red-500 text-center text-white text-2xl p-5 col-span-12">لم تضف اي اعلان الى المفضله حتى الان</div>
        @endforelse
    </ul>
</div>

@endsection
