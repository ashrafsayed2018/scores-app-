{{-- md:invisible --}}
<div class="bottom-nav flex items-center justify-between bg-white border-t-2 border-gray-100 fixed bottom-0 left-2 right-2 w-full h-10">
    <div class="right flex items-center w-1/2 justify-between">
        <a href="/home" class="w-1/2">
            <i class="fas fa-home w-full text-right mr-2">   </i>
        </a>
        <a href="" class="flex-1 w-1/2">
            <i class="fas fa-search w-full text-right mr-2"> </i>
        </a>
    </div>
    <div class="add-ad absolute -top-5 bg-green-600 w-10 h-10 text-center rounded-full">
        @auth
        <a href="{{ route('post.create') }}">
            <i class="fas fa-plus text-white mt-3"></i>
        </a>
        @else
        <a href="{{ route('login') }}">
            <i class="fas fa-plus text-white mt-3"></i>
        </a>
        @endauth

    </div>
    <div class="left flex flex-1 justify-center">
        @auth
        <a href="{{ route('notifications.show') }}" class="w-1/2">
            <i class="fas fa-bell w-full text-left ml-2"></i>
        </a>
        @else
        <a href="{{ route('login') }}" class="w-1/2">
            <i class="fas fa-bell w-full text-left ml-2"></i>
        </a>
        @endauth

        @auth
        <a href="{{ route('profile.show', auth()->user()->slug) }}" class="w-1/2">
            <i class="fa fa-user w-full text-left ml-2"></i>
        </a>
        @else
        <a href="{{ route('login') }}" class="w-1/2">
            <i class="fa fa-user w-full text-left ml-2"></i>
        </a>
        @endauth

    </div>
</div>
