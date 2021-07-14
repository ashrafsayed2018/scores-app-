<div class="favourites w-1/2 mr-3">
    <div class="heart bg-white w-9 h-9 rounded-lg flex justify-center flex-wrap content-center shadow-2xl">
       @auth
            @if ($post->isFavorited())
                <form wire:submit.prevent="destroy" wire:model="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="focus:outline-none relative removeTooltip">
                        <i class="fa fa-heart liked"></i>
                        <span class="removeTooltiptext invisible absolute right-9 -top-1 z-1 w-40 text-white bg-gray-700 py-1 rounded-md"> حذف من المفضله</span>
                    </button>
                </form>
                @else
                <form wire:submit.prevent="store" wire:model="post">
                    @csrf
                    <button type="submit" class="focus:outline-none relative addTooltip" >
                        <i class="far fa-heart text-gray-300 cursor-pointer hover:text-red-500"></i>
                        <span class="addTooltiptext invisible absolute right-9 -top-1 z-1 w-40 text-white bg-gray-700 py-1 rounded-md"> اضف الى المفضله</span>
                    </button>
                </form>
            @endif
       @endauth
    </div>
</div>

