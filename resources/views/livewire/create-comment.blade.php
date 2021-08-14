@auth
<div class="card mb-6 bg-white shadow-lg p-3">
    <h5 class="mb-3">اضافة تعليق على الاعلان</h5>
    <form wire:submit.prevent="store()">
        @csrf
        <div class="form-group">
            <textarea type="text" wire:model.lazy="body" class="w-full h-10 border border-gray-300 focus:outline-none pr-3 pt-2 mt-3 rounded-lg resize-none" placeholder="اضافة تعليق"></textarea>
            <input type="hidden" wire:model="post_id"  />
        </div>
        <div class="form-group">
            <input type="submit" class="button button-green" style="font-size: 0.8em;" value="تعليق" />
        </div>
    </form>
    @error('body')
        <span class="text-red-600">{{ $message }}</span>
    @enderror
</div>
@endauth
@guest
<h5 class="mb-3">
    <a href="{{ route('login') }}">اضافة تعليق على الاعلان</a>
</h5>
@endguest
