@extends('layouts.app')

@section('content')
<div class="container lg:w-2/3 mx-auto">
    <h1 class="text-xl mx-auto font-bold mb-3 text-center">صفحة الاعضاء </h1>
    @if ($profiles->count() > 0)
    <ul class="bg-white shadow-lg px-3 py-3">
        @forelse ($profiles as $profile)

            <li class="flex justify-between items-center  mb-3">
               <div class="flex mb-3 items-center">
                   <img src="{{ asset('storage/users_images/' .  $profile->image) }}" alt="user image" class="bloci rounded-full" style="width: 40px;height:40px">
                    <a href="{{ route('profile.show',[$profile->user->slug]) }}" class="mr-4">
                        {{ $profile->user->slug }}
                    </a>
               </div>
               <div>
                 <livewire:follow :profile="$profile" :user="$profile->user" />
               </div>
            </li>

        @empty
        @endforelse
    </ul>
    @endif

</div>
@endsection
