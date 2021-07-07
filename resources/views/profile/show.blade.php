@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="items-center mb-6">

        <img src="{{asset($user->imagePath())}}" alt="" class="block mx-auto rounded-full p-1 border shadow-md border-blue-300" style="width: 100px;height:100px">

        <livewire:follow :profile="$profile" :user="$user" />
        @can('edit', $user)
        <button class="button button-blue focus:outline-none">
            <a href="{{ route('profile.edit',[current_user()->slug]) }}">
                تحديث الملف الشخصي
            </a>
       </button>
        @endcan
    </div>
    <div class="lg:flex justify-between">
        <ul class="mx-auto lg:w-3/4">
        @if ($user->profile)
            <li>{{ $user->profile->username }}</li>
            <li>{{ $user->profile->about }}</li>
            <li>{{ $user->created_at->diffForHumans() }}</li>
            <li>{{ $user->profile->gender }}</li>
            <li>{{ $user->profile->age }}</li>
        @endif
        </ul>
      @include('includes._follwing_list')
    </div>

</div>
@endsection
