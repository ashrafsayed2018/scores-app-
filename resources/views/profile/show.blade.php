@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-32">
    <div class="items-center mb-6">

    </div>
    <div class="wrapper">
        <div class="profile-card js-profile-card">
          <div class="profile-card__img">
            <img src="{{ asset($profile->user->imagePath()) }}" alt="profile card">
          </div>

          <div class="profile-card__cnt js-profile-cnt">
            <div class="profile-card__name">{{ $profile->name }}</div>
            <div class="profile-card__txt">{{ $profile->about }}</div>
            <div class="profile-card-loc">
              <span class="profile-card-loc__icon">
                <i class="fas fa-map-marker-alt ml-3"></i>
              </span>

              <span class="profile-card-loc__txt">
               الكويت
              </span>
            </div>

            <div class="profile-card-inf">
              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">{{ $profile->user->followers->count() }}</div>
                <div class="profile-card-inf__txt">متابعين</div>
              </div>

              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">{{ $profile->user->follows->count() }}</div>
                <div class="profile-card-inf__txt">يتابع</div>
              </div>

              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">{{ $profile->user->posts->count() }}</div>
                <div class="profile-card-inf__txt">الاعلانات</div>
              </div>

              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">{{ getUserScore($profile->user->id)}}</div>
                <div class="profile-card-inf__txt">الجوايز</div>
              </div>
            </div>


            <div class="profile-card-ctr flex justify-between items-center mt-6">
                @auth
                    @if(current_user()->id != $profile->user->id)
                    <button class="profile-card__button button--blue js-message-btn">دردشه</button>
                    @else
                    <label for="referrer" class="block w-full lg:w-2/4 text-sm mb-6"> انشر الموقع واحصل على 5 نقاط اضافيه لكل مستخدم جديد</label>
                    {{-- <div class="flex mb-6">
                        <input type="text" id="referrer" class="w-4/5 border-2 border-gray-500 outline-none p-2 rounded-xl" value="{{ Auth::user()->referral_link }}" id="referrer">
                        <button id="btnCopy" class="button button-green">Copy</button>
                    </div> --}}
                        {{-- social share component --}}
                    <x-social-share/>

                    @endif
                @endauth
                <livewire:follow :profile="$profile" :user="$profile->user" />
            </div>

            <div class="flex justify-center items-center">
                @can('edit',$profile->user)
                <button class="profile-card__button button--blue focus:outline-none">
                    @if ($profile)
                    <a href="{{ route('profile.edit',[$profile->slug]) }}">
                        تحديث الملف الشخصي
                    </a>
                    @else
                    <a href="{{ route('profile.create') }}">
                        عمل الملف الشخصي
                    </a>
                    @endif

               </button>
                @endcan
            </div>
          </div>

        </div>
    </div>

</div>
@endsection
