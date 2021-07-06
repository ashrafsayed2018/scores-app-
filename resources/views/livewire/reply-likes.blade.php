
<div class="flex items-center">
    @auth
    @if ($reply->isLikedBy(auth()->user(),"App\Reply") )
    <form wire:submit.prevent="destroy" wire:model="reply">

        <button type="submit" class="focus:outline-none">
        <i class="fa fa-heart liked"></i>
        </button>
    </form>
    @else
    <form  wire:submit.prevent="store" wire:model="reply">

        <button type="submit" class="focus:outline-none">
            <i class="far fa-heart"></i>
        </button>
    </form>
    @endif
    <span class="likes text-xs text-gray-500 mr-3">
        {{ $count }}
    </span>
    @endauth

</div>
