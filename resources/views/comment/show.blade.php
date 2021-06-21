<div class="card lg:w-full my-10">
    <div class="comment-count">{{ $post->comments->count() }} comments</div>
    @foreach($post->comments as $comment)
    <div class="display-comment">
        <p>{{ $comment->comment }}</p>

        <livewire:comment-likes :comment="$comment" :wire:key="$comment->id">

        <livewire:reply-likes :comment="$comment" :wire:key="$comment->id">

        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="mr-6">
                <textarea name="comment" class="w-full border border-red-500" > </textarea>
                <input type="hidden" name="post_id" value="{{ $comment->commentable_id}}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="button button-green text-sm" style="font-size: 0.8em;" value="Reply" />
            </div>
        </form>

    </div>
    @endforeach

    <hr />
 </div>
