<div class="post-card col-span-6 lg:col-span-4 mb-10 lg:mb-0">
    <div class="card bg-white  w-full shadow-lg border border-gray-400" style="height: 410px">
        <a href="{{ route('post.show',$post->slug) }}">

            <img src="{{ asset(firstPostImage($post)) }}" alt="{{ $post->title }}" style="width: 100%;height:220px">
            <div class="post-details px-5" style="height: 120px">
                <h2 class="mb-2 font-bold mt-3">{{ $post->title }}</h2>
                <hr>
                <p class="mb-2 break-word">
                    {{ Str::limit($post->description, $limit = 100, $end = '...') }}
                </p>
            </div>
        </a>
        <div class="flex justify-between p-5">
            <div>  نشر منذ {{ $post->created_at->diffForHumans(null, true) }} </div>
            <livewire:post-likes :post="$post" :wire:key="$post->id">

        </div>

    </div>
</div>


