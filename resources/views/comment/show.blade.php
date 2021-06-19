<div class="card lg:w-full my-10">
    <div class="comment-count">{{ $post->comments->count() }} comments</div>
    @foreach($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->username }}</strong>
        <p>{{ $comment->comment }}</p>
        <div class="flex items-center">

            @if ($comment->isLikedBy(auth()->user(),"App\Comment") )
            <form action="/comment/{{ $comment->id }}/dislike" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="focus:outline-none">
                <i class="fa fa-heart liked"></i>
                </button>
            </form>
            @else
            <form action="/comment/{{ $comment->id }}/like" method="POST">
                @csrf
                <button type="submit" class="focus:outline-none">
                    <i class="far fa-heart"></i>
                </button>
            </form>
            @endif
            <span class="likes text-xs text-gray-500 mr-3">
                {{ $comment->likes->count() ? : 0 }}
            </span>

         </div>
        @include('reply.show', ['replies' => $comment->replies])
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <textarea name="comment" class="w-full border border-gray-500" > </textarea>
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
