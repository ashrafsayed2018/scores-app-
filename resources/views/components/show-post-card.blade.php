
    <div class="post_images relative col-span-3 bg-white rounded-lg shadow-lg">
        <div class="favourite-report absolute top-2 right-2 flex w-full z-10 justify-between">
             <livewire:post-favourite :post="$post" />
            <div class="report ml-3 flex justify-between align-baseline w-40 h-70 bg-white shadow rounded-lg p-2">
               <p class="text-xs lg:text-sm">الابلاغ عن الاساءه</p>
               <i class="fas fa-flag text-yellow-600"></i>
            </div>
        </div>
        <div class="swiper h-4/6">
            <div class="swiper-container gallery-top mx-auto mb-5 w-full h-full">
                <div class="swiper-wrapper">

                     @foreach (allPostImages($post) as $postImage)
                     <div class="swiper-slide w-full h-full">
                         <img src="{{ asset('storage/post_images/'. $postImage) }}" class="w-full h-full" alt="">
                     </div>
                     @endforeach
                </div>
            </div>

            <div class="swiper-container gallery-thumbs h-2/6">
                    <div class="swiper-wrapper">
                        @foreach (allPostImages($post) as $postImage)
                        <div class="swiper-slide w-1/4 opacity-40 h-full">
                            <img src="{{ asset('storage/post_images/'. $postImage) }}" class="w-full h-full" alt="">
                        </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <!-- <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-d7ea9d0b88b10aa73" aria-disabled="false"></div> -->
                    <div class="swiper-button-next swiper-button-transparent w-10 h-full"></div>
                    <div class="swiper-button-prev swiper-button-black w-10 h-full bg-white"></div>
            </div>
        </div>
        <div class="post-actions absolute bottom-3 right-3 flex">
           <div class="comments mx-4 text-sm text-gray-500">
            <i class="far fa-comment ml-3 cursor-pointer show_all_comments"></i>
            <span class="comments_count text-sm">{{ $post->comments->count() }}</span>
           </div>
           <div class="likes text-sm text-gray-500">
            <livewire:post-likes :post="$post" :wire:key="$post->id">
           </div>
         </div>
    </div>


