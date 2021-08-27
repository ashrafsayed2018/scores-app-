<div class=" bg-white fixed top-0 left-0 w-full" style="z-index: 1000000000000">
    <div class="pt-2 lg:grid lg:grid-cols-8 shadow-lg">
        <div class="right col-span-2 flex items-baseline justify-between mb-6 px-3">
            <div class="logo flex justify-around items-center flex-1">
                @auth
                    <div class="dropdown inline-block relative " style="z-index: 100000000">
                        <button class="text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                          <span class="mr-1">
                            <img src="{{ asset(auth()->user()->imagePath()) }}"
                                            alt="{{ auth()->user()->name }}"
                                            class="block w-10 h-10 rounded-full">
                          </span>
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                          </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                        @if (current_user()->profile)
                        <li class=""><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('profile.show', current_user()->profile->slug) }}">الملف</a></li>
                        @endif
                          <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('prefrences.show') }}">المفضله</a></li>
                          <li class="">
                              <a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('show_user_posts',auth()->user()->id) }}">
                                اعلاناتي
                             </a>
                          </li>
                          <li>
                            <a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"  href="{{ route('dashoboard.user',auth()->user()) }}">لوحة التحكم</a>
                          </li>
                          <li>
                              <a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="{{ route('messages') }}">الرسائل</a>
                          </li>

                        </ul>
                    </div>
                    <a href="{{ route('notifications.show') }}" class="relative">
                        <span class="notification_count absolute -top-3 left-3 text-sm">{{ auth()->user()->unreadNotifications->count() }}</span>
                        <i class="fa fa-bell text-black"></i>
                    </a>

                 @else
                   <div class="flex flex-1 items-center justify-around">
                       <a href="/">سكور ادز </a>
                       <img src="{{ asset('/storage/images/header_bg.webp') }}" alt="logo" class="w-10 h-10 rounded-full">
                   </div>

                 @endauth
            </div>
        </div>
        @auth
        <div class="middle  col-span-4 flex items-center">
            <div class="grid grid-cols-5 w-full text-gray-600 text-xs">
                <a class="mx-1 lg:mx-2 mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 pb-3 cursor-pointer">
                    <i class="far fa-clock text-xs lg:text-xl ml-2"></i>
                    <span> عقارات </span>
                </a>
                <a class="mx-1 lg:mx-2 mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-car text-xs lg:text-xl ml-2"></i>
                    <span>  محركات </span>
                </a>
                <a class="mx-1 lg:mx-2  mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-home text-xs lg:text-xl ml-2"></i>
                    <span>  عقارات </span>
                </a>
                <a class="mx-1 lg:mx-2 mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-tools text-xs lg:text-xl ml-2"></i>
                    <span>  خدمات </span>
                </a>
                <a class="mx-1 lg:mx-2  mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-tools text-xs lg:text-xl ml-2"></i>
                    <span>  خدمات </span>
                </a>

            </div>
        </div>
        @endauth

        @guest
        <div class="middle  col-span-4 flex items-center">
            <div class="grid grid-cols-5 w-full text-gray-600 text-xs">
                <a class="mx-1 lg:mx-2 mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 pb-3 cursor-pointer">
                    <i class="far fa-clock text-xs lg:text-xl ml-2"></i>
                    <span> عقارات </span>
                </a>
                <a class="mx-1 lg:mx-2 mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-car text-xs lg:text-xl ml-2"></i>
                    <span>  محركات </span>
                </a>
                <a class="mx-1 lg:mx-2  mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-home text-xs lg:text-xl ml-2"></i>
                    <span>  عقارات </span>
                </a>
                <a class="mx-1 lg:mx-2 mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-tools text-xs lg:text-xl ml-2"></i>
                    <span>  خدمات </span>
                </a>
                <a class="mx-1 lg:mx-2  mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-tools text-xs lg:text-xl ml-2"></i>
                    <span>  خدمات </span>
                </a>
            </div>
        </div>
        <div class="left hidden lg:col-span-2 lg:flex justify-end ml-5 items-center ">
            <div class="login-register flex items-center">
                <a href="{{ route('register') }}" class="button button-blue ml-5">تسجيل دخول</a>
                <a href="{{ route('login') }}" class="button button-green">دخول</a>
            </div>
        </div>
        @endguest
        @auth
        <div class="left xs:hidden  lg:col-span-2 lg:flex justify-end">
            <div class="ad-button flex items-center">
                <a href="{{ route('post.create') }}" class="button button-blue ml-5">
                    <i class="fas fa-plus text-xs  text-white"></i>
                    ارفع اعلان
                </a>

                <a class="block text-3xl text-gray-700 ml-5" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt transform rotate-180"></i>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </div>
        </div>
        @endauth
    </div>
</div>
