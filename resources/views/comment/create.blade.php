<div class="card mb-6">
    <h5>Leave a comment</h5>
    <form method="post" action="{{ route('comment.add') }}">
        @csrf
        <div class="form-group">
            <textarea type="text" name="comment" class="w-full border border-gray-500" ></textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="button button-green" style="font-size: 0.8em;" value="Add Comment" />
        </div>
    </form>
     @error('comment')
        <span class="text-red-600">{{ $message }}</span>
     @enderror
</div>
