<div>
    @auth
        <form wire:submit.prevent="store()" class="bg-white flex items-center">
            @csrf
            <div class="flex-1">
                <textarea wire:model="body" class="w-full h-10 border border-gray-300 focus:outline-none pr-3 pt-2 mt-3 rounded-lg resize-none" placeholder="اضافة رد" data-textarea="{{ $comment->id }}"></textarea>
                <input type="hidden" wire:model="post_id"  />
                <input type="hidden" wire:model="comment_id"  />
            </div>

            <div class="form-group">
                <input type="submit" class="button button-green text-sm" style="font-size: 0.8em;" value="رد"  />
            </div>
        </form>

        @error('body')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    @endauth
</div>

