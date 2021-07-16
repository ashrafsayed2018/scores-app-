@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="items-center mb-6">

    </div>
    <div class="wrapper">
        <div class="profile-card js-profile-card">
          <div class="profile-card__img">
            <img src="{{ asset($user->imagePath()) }}" alt="profile card">
          </div>

          <div class="profile-card__cnt js-profile-cnt">
            <div class="profile-card__name">{{ $user->name }}</div>
            <div class="profile-card__txt">Front-end Developer from <strong>Mesopotamia</strong></div>
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
                <div class="profile-card-inf__title">{{ $user->followers->count() }}</div>
                <div class="profile-card-inf__txt">متابعين</div>
              </div>

              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">{{ $user->follows->count() }}</div>
                <div class="profile-card-inf__txt">يتابع</div>
              </div>

              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">{{ $user->posts->count() }}</div>
                <div class="profile-card-inf__txt">الاعلانات</div>
              </div>

              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">{{ getUserScore($user->id)}}</div>
                <div class="profile-card-inf__txt">الجوايز</div>
              </div>
            </div>


            <div class="profile-card-ctr flex justify-between items-center mt-6">
                @auth
                    @if(current_user()->id != $user->id)
                    <button class="profile-card__button button--blue js-message-btn">دردشه</button>
                    @endif
                @endauth
                <livewire:follow :profile="$profile" :user="$user" />
            </div>

            <div class="flex justify-center items-center">
                @can('edit', $user)
                <button class="profile-card__button button--blue focus:outline-none">
                    <a href="{{ route('profile.edit',[current_user()->slug]) }}">
                        تحديث الملف الشخصي
                    </a>
               </button>
                @endcan
            </div>
          </div>

        </div>
    </div>

</div>
@endsection
