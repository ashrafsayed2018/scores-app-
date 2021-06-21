<div class="flex items-center">
    <ul class="mr-10">
        @foreach ($comment->replies as $reply)

        <li class="">
            <span class="ml-5 inline-block">{{ $reply->created_at->diffForHumans(null,true) }}</span>

             <strong>{{ $reply->user->username }}</strong>

             <p class="font-semibold text-green-400 mr-6">{{ $reply->comment }}</p>


              {{-- <livewire:reply-likes :reply="$reply" :wire:key="$reply->id"> --}}

                <div class="flex items-center">
                    @if ($reply->isLikedBy(auth()->user(),"App\Comment") )
                    <form wire:submit.prevent="destroy" wire:model="comment" wire:click="$emit('updateReplyLikeCount')">

                        <button type="submit" class="focus:outline-none">
                        <i class="fa fa-heart liked"></i>
                        </button>
                    </form>
                    @else
                    <form  wire:submit.prevent="store" wire:model="comment" wire:click="$emit('updateReplyLikeCount')">

                        <button type="submit" class="focus:outline-none">
                            <i class="far fa-heart"></i>
                        </button>
                    </form>
                    @endif
                <span class="likes text-xs text-gray-500 mr-3">
                    {{ $count }}
                </span>
            </div>


        </li>
        @endforeach

    </ul>

</div>
