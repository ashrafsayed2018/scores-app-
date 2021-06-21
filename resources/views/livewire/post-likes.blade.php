
<div class="flex items-center">
    @if ($post->isLikedBy(auth()->user(),'App\Post'))
    <form wire:submit.prevent="destroy" wire:model="post" wire:click="$emit('updatePostLikeCount')">
        @method('DELETE')
        @csrf
        <button type="submit" class="focus:outline-none"  >
        <i class="fa fa-heart liked"></i>
        </button>
    </form>
    @else
    <form wire:submit.prevent="store" wire:model="post" wire:click="$emit('updatePostLikeCount')">
        @csrf
        <button type="submit" class="focus:outline-none" >
            <i class="far fa-heart" ></i>
        </button>
    </form>
    @endif
    <span class="likes text-xs text-gray-500 mr-3" >
        {{ $count }}
    </span>
</div>
