<div class="lg:w-1/4 bg-gray-200 rounded-lg pb-4 px-4">
    <h3 class="font-bold text-xl mb-4">يتابع</h3>
    <ul>
        @forelse ($user->follows as $user)
         <li>
             <div>
                 <a href="{{ route('profile.show', $user->slug) }}" class="flex text-xl mb-2">
                    <img src="{{ asset($user->imagePath()) }}" alt="profile image" class="rounded-full p-1 ml-5 shadow border border-blue-300" style="width: 40px;height:40px">
                    <small>{{ $user->name }}</small>
                 </a>
             </div>
         </li>
        @empty
            <p>لا تتابع احد حتي الان </p>
        @endforelse
    </ul>

</div>
