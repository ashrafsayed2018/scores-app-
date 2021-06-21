<div class="flex items-center">

    @if ($comment->isLikedBy(auth()->user(),"App\Comment") )
    <form wire:submit.prevent="destroy" wire:model="comment" wire:click="$emit('updateCommentLikeCount')">
        @method('DELETE')
        @csrf
        <button type="submit" class="focus:outline-none">
        <i class="fa fa-heart liked"></i>
        </button>
    </form>
    @else
    <form  wire:submit.prevent="store" wire:model="comment" wire:click="$emit('updateCommentLikeCount')">
        @csrf
        <button type="submit" class="focus:outline-none">
            <i class="far fa-heart"></i>
        </button>
    </form>
    @endif
    <span class="likes text-xs text-gray-500 mr-3">
        {{ $count }}
    </span>

 </div>
