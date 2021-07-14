@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="items-center mb-6">
        <img src="{{asset($user->imagePath())}}" alt="" class="block mx-auto rounded-full p-1 border shadow-md border-blue-300" style="width: 100px;height:100px">

        @can('edit', $user)
        <button class="button button-blue focus:outline-none">
            <a href="{{ route('profile.edit',[current_user()->slug]) }}">
                تحديث الملف الشخصي
            </a>
       </button>
        @endcan
    </div>
    <div class="wrapper">
        <div class="profile-card js-profile-card">
          <div class="profile-card__img">
            <img src="https://res.cloudinary.com/muhammederdem/image/upload/v1537638518/Ba%C5%9Fl%C4%B1ks%C4%B1z-1.jpg" alt="profile card">
          </div>

          <div class="profile-card__cnt js-profile-cnt">
            <div class="profile-card__name">Muhammed Erdem</div>
            <div class="profile-card__txt">Front-end Developer from <strong>Mesopotamia</strong></div>
            <div class="profile-card-loc">
              <span class="profile-card-loc__icon">
                <svg class="icon"><use xlink:href="#icon-location"></use></svg>
              </span>

              <span class="profile-card-loc__txt">
                Istanbul, Turkey
              </span>
            </div>

            <div class="profile-card-inf">
              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">1598</div>
                <div class="profile-card-inf__txt">Followers</div>
              </div>

              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">65</div>
                <div class="profile-card-inf__txt">Following</div>
              </div>

              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">123</div>
                <div class="profile-card-inf__txt">Articles</div>
              </div>

              <div class="profile-card-inf__item">
                <div class="profile-card-inf__title">85</div>
                <div class="profile-card-inf__txt">Works</div>
              </div>
            </div>

            <div class="profile-card-social">
              <a href="https://www.facebook.com/iaMuhammedErdem" class="profile-card-social__item facebook" target="_blank">
                <span class="icon-font">
                    <svg class="icon"><use xlink:href="#icon-facebook"></use></svg>
                </span>
              </a>

              <a href="https://twitter.com/iaMuhammedErdem" class="profile-card-social__item twitter" target="_blank">
                <span class="icon-font">
                    <svg class="icon"><use xlink:href="#icon-twitter"></use></svg>
                </span>
              </a>

              <a href="https://www.instagram.com/iamuhammederdem" class="profile-card-social__item instagram" target="_blank">
                <span class="icon-font">
                    <svg class="icon"><use xlink:href="#icon-instagram"></use></svg>
                </span>
              </a>

              <a href="https://www.behance.net/iaMuhammedErdem" class="profile-card-social__item behance" target="_blank">
                <span class="icon-font">
                    <svg class="icon"><use xlink:href="#icon-behance"></use></svg>
                </span>
              </a>

              <a href="https://github.com/muhammederdem" class="profile-card-social__item github" target="_blank">
                <span class="icon-font">
                    <svg class="icon"><use xlink:href="#icon-github"></use></svg>
                </span>
              </a>

              <a href="https://codepen.io/JavaScriptJunkie" class="profile-card-social__item codepen" target="_blank">
                <span class="icon-font">
                    <svg class="icon"><use xlink:href="#icon-codepen"></use></svg>
                </span>
              </a>

              <a href="http://muhammederdem.com.tr/" class="profile-card-social__item link" target="_blank">
                <span class="icon-font">
                    <svg class="icon"><use xlink:href="#icon-link"></use></svg>
                </span>
              </a>

            </div>

            <div class="profile-card-ctr">
              <button class="profile-card__button button--blue js-message-btn">Message</button>
              {{-- <button class="profile-card__button button--orange">
              </button> --}}
              <livewire:follow :profile="$profile" :user="$user" />
            </div>
          </div>

          <div class="profile-card-message js-message">
            <form class="profile-card-form">
              <div class="profile-card-form__container">
                <textarea placeholder="Say something..."></textarea>
              </div>

              <div class="profile-card-form__bottom">
                <button class="profile-card__button button--blue js-message-close">
                  Send
                </button>

                <button class="profile-card__button button--gray js-message-close">
                  Cancel
                </button>
              </div>
            </form>

            <div class="profile-card__overlay js-message-close"></div>
          </div>

        </div>
    </div>

</div>
@endsection
