<!-- Slider recommended posts  -->
<div class="recommended-slider swiper-container w-full py-12 lg:mx-8">
    <h2 class="text-center mb-5 text-3xl border-b-2 border-blue-500 w-80 mx-auto pb-3">اعلانات موصى بها</h2>
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->

        @forelse (recommendedPosts($post) as $recommend)
            <div class="swiper-slide bg-center bg-cover w-80 bg-white overflow-hidden rounded-sm">
                <div class="picture w-80 h-80 overfolw-hidden">
                <img class="block object-cover w-full h-full" src="{{ asset(firstPostImage($recommend)) }}" alt="">
                </div>
                <div class="detail py-6 px-5 font-bold text-center">
                <h3 class="m-0 text-xl">{{ $recommend->title }}</h3>
                <span class="font-base text-red-600 block">{{ $recommend->created_at->diffForHumans() }}</span>
                </div>
            </div>
        @empty
        <div>لا توجد اعلانات موصى بها </div>
        @endforelse
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <!--     <div class="swiper-button-prev"></div> -->
    <!--     <div class="swiper-button-next"></div> -->

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js"></script>
    <script src="script.js"></script> --}}
</div>

