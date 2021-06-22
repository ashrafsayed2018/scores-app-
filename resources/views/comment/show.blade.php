<div class="card lg:w-full my-10">
    <div class="comment-count">{{ $post->comments->count() }} comments</div>
    @foreach($post->comments as $comment)
    <div class="display-comment">
        <p>{{ $comment->body }}</p>

        <livewire:comment-likes :comment="$comment" :wire:key="$comment->id">

            <div class="flex items-center">

                <ul class="mr-10">
                    @foreach ($comment->replies as $reply)


                    <li class="">
                        <span class="ml-5 inline-block">{{ $reply->created_at->diffForHumans(null,true) }}</span>

                         <strong>{{ $reply->user->username }}</strong>

                         <p class="font-semibold text-green-400 mr-6">{{ $reply->body }}</p>

                         <livewire:reply-likes :reply="$reply" :wire:key="$reply->id">
                    </li>
                    @endforeach

                </ul>
            </div>


        <livewire:create-reply :comment="$comment" :post="$post" wire:key="$comment->id"/>

    </div>
    @endforeach

    <hr />
 </div>
