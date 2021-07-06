
<div class="flex items-center">
 @auth
    @if ($post->isLikedBy(auth()->user(),'App\Post'))
    <form wire:submit.prevent="destroy" wire:model="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="focus:outline-none">
        <i class="fa fa-heart liked"></i>
        </button>
    </form>
    @else
    <form wire:submit.prevent="store" wire:model="post">
        @csrf
        <button type="submit" class="focus:outline-none" >
            <i class="far fa-heart" ></i>
        </button>
    </form>
    @endif
    <span class="likes text-xs text-gray-500 mr-3" >
        {{ $count }}
    </span>
 @endauth
 @guest
    <a href="{{ route('login') }}">
    <i class="far fa-heart"></i>
    </a>
 @endguest
</div>

{{-- wire:click="$emit('updatePostLikeCount')" --}}
