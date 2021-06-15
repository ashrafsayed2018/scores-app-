@extends('layouts.app')

@section('content')
<div class="container lg:w-2/3 mx-auto">
    <h1 class="text-xl mx-auto font-bold mb-3 text-center">صفحة الاعضاء </h1>
    <ul class="bg-white shadow-lg px-3 py-3">
        @forelse ($profiles as $profile)
            <li class="flex justify-between items-center">
               <div class="flex mb-3 items-center">
                   <img src="{{ asset('storage/images/' .  $profile->image) }}" alt="user image" class="bloci rounded-full" style="width: 40px;height:40px">
                    <a href="{{ route('profile.show',[$profile->user->slug]) }}" class="mr-4">
                        {{ $profile->username }}
                    </a>
               </div>
               <div>

                   @if(current_user()->id != $profile->user_id)
                   <form action="/profile/{{ $profile->username }}/follow" method="POST">
                     @csrf
                     <button type="submit" class="button {{ !current_user()->following($profile->user) ? 'button-green' : 'button-blue'}}">
                       {{ current_user()->following($profile->user) ? ' الغاء المتابعه ' : 'متابعه' }}

                     </button>
                   </form>
                 @endif
               </div>
            </li>
        @empty

        @endforelse
    </ul>
</div>
@endsection