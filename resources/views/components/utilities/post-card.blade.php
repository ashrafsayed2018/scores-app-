@foreach ($category->posts as $post)

<div class="post-card col-span-4 mx-auto shadow-lg rounded-sm bg-white">
    <div class="flex flex-col">
       <div class="image">
           <img src="{{ asset('storage/post_images/'.$post->images) }}" alt="post image"  class="w-full h-60">
       </div>
       <div class="post-details flex justify-between items-center p-5">
          <div class="post-date">{{ $post->created_at->diffForHumans()}}</div>
          <div class="post-likes">{{ $post->likes->count() }} likes</div>
       </div>
       <div class="post-title p-5">
           <p>{{ $post->title }}</p>
       </div>
    </div>
 </div>
@endforeach


{{--
{{ print_r($category) }} --}}

