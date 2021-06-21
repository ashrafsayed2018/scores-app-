<div class="card mb-6">
    <h5>Leave a comment</h5>
    <form wire:submit.prevent="store()">
        @csrf
        <div class="form-group">
            <textarea type="text" wire:model="body" class="w-full border border-gray-500" ></textarea>
            <input type="hidden" wire:model="post_id"  />


        </div>
        <div class="form-group">
            <input type="submit" class="button button-green" style="font-size: 0.8em;" value="Add Comment" />
        </div>
    </form>
     @error('body')
        <span class="text-red-600">{{ $message }}</span>
     @enderror
</div>
