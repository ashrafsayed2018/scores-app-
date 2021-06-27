<div class="sticky">
    <div class="block container mx-auto pt-2 lg:grid lg:grid-cols-4 shadow-lg">
        <div class="right col-span-1 flex items-center justify-between mb-3">
            <div class="logo">
                <img src="{{ asset('storage/images/header_bg.webp') }}"
                 alt="log"
                 class="block w-10 h-10 rounded-full">
            </div>
            <div class="ad-button">
                <a href="{{ route('post.create') }}" class="button button-blue">
                    <i class="fas fa-plus text-sm  text-white"></i>
                    ارفع اعلان
                </a>
            </div>
        </div>
        <div class="middle  col-span-2 flex items-center">
            <div class="grid grid-cols-2 lg:grid-cols-5 text-gray-600 text-sm">
                <a class="mx-2 mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 pb-3 cursor-pointer">
                    <i class="far fa-clock text-xl ml-2"></i>
                    <span> احدث الاعلانات </span>
                </a>
                <a class="mx-2 mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-car text-xl ml-2"></i>
                    <span>  محركات </span>
                </a>
                <a class="mx-2  mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-home text-xl ml-2"></i>
                    <span>  عقارات </span>
                </a>
                <a class="mx-2  mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-tools text-xl ml-2"></i>
                    <span>  خدمات </span>
                </a>
                <a class="mx-2  mb-3 hover:text-blue-400 hover:border-blue-400 border-b-2 border-transparent transition duration-200 cursor-pointer">
                    <i class="fas fa-list text-xl ml-2"></i>
                    <span>  كل التصنيفات </span>
                </a>
            </div>
        </div>
        @guest
        <div class="left col-span-1">
            <a href="{{ route('register') }}">تسجيل دخول</a> /
            <a href="{{ route('login') }}">دخول</a>
        </div>
        @endguest
    </div>
</div>
