@extends('layouts.app')

@section('content')

<div class="xl:mx-8">
    <div class="block post_detail py-6 font-bold text-centers  2xl:grid gap-8 grid-cols-5">
        <x-show-post-card :post="$post" />
        <x-post-info-card :post="$post" />
    </div>
    <div class="block all_comments lg:w-full lg:mt-10">
        <livewire:create-comment :post="$post"/>
        <livewire:show-comments :post="$post" :key="time().$post->id"/>
    </div>
    <x-recommended-posts :post="$post" />
</div>
@endsection
@section('scripts')
<script>

  $(document).ready(function () {
            $('.make_reply').on('click', function () {
                // find the id of make reply button
                var id = $(this).attr('id');
                $(`textarea[data-textarea='${id}']`).focus()
                // hid all reply class which not the same data id of the make reply id
                $(`.reply:not([data-id=${id}])`).addClass('hidden');
                    // show the reply class which match the data id and the make reply id
                $(`.reply[data-id='${id}']`).toggleClass('hidden');

            })

            // show all comemnts

            $('.show_all_comments, .show_comments').on('click', function() {
                $('#show_all_comments').toggleClass('hidden');

                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#show_all_comments").offset().top
                }, 1000);
            })
            // swiper slider
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
            });
            var galleryTop = new Swiper('.gallery-top', {
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                thumbs: {
                    swiper: galleryThumbs
                }
                });

            var swiper = new Swiper(".recommended-slider", {
                autoplay: {
                delay: 1000,
                },
                clickable:'true',
                slidesPerGroup:1,
                effect: "coverflow",
                    loop: true,
                centeredSlides: true,
                slideToClickedSlide: true,
                allowTouchMove: false,
                grabCursor: false,
                slidesPerView: "auto",
                coverflowEffect: {
                    rotate: 0,
                    stretch: 0,
                    depth: 50,
                    modifier: 2,
                    slideShadows: true
                },
                pagination: {
                    el: ".swiper-pagination"
                }
                }
            );
  })

</script>
@endsection
