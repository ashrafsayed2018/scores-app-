<div class="post-card col-span-4 mx-auto">
    <div class="card bg-white  mb-5 lg:mb-0 w-full shadow-lg border border-gray-400" style="height: 500px">
        <a href="{{ route('post.show',$post->slug) }}">
            <img src="{{ asset('storage/post_images/'. $post->images) }}" alt="{{ $post->title }}" style="width: 100%;height:250px">
            <div class="post-details px-5" style="height: 200px">
                <h2 class="mb-2 font-bold">{{ $post->title }}</h2>
                <hr>
                <p class="mb-2 break-all">{{ $post->description }}</p>
            </div>
        </a>
        <div class="flex justify-between p-5">
            <div> نشر منذ  {{ $post->created_at->diffForHumans(null, true) }}</div>
            <livewire:post-likes :post="$post" :wire:key="$post->id">

        </div>

    </div>
</div>

