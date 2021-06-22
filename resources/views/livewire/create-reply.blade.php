<div>
    <form wire:submit.prevent="store()">
        @csrf
        <div class="mr-6">
            <textarea wire:model="body" class="w-full border border-red-500"> </textarea>
            <input type="hidden" wire:model="post_id"  />
            <input type="hidden" wire:model="comment_id"  />
        </div>
        {{-- {{ var_dump($comment) }} --}}
        <div class="form-group">
            <input type="submit" class="button button-green text-sm" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>

    @error('body')
    <span class="text-red-600">{{ $message }}</span>
    @enderror

</div>
{{-- value="{{ $post->id}}"
value="{{ $comment->id }}" --}}

