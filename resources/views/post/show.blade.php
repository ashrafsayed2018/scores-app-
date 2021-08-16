@extends('layouts.app')

@section('content')
@if ($post)

<div class="xl:mx-8 mt-36">
    <div class="flex justify-between items-center w-full">
        <a href="{{ route('home') }}" class="text-xs text-gray-500">
            <i class="fa fa-arrow-right"></i>
            <span>الرجوع</span>
        </a>
        <div class="text-sm text-gray-500 felx justify-between items-center">
            <a href="/home">الرئيسيه</a>
            /
            <a href="">الفئات</a>
            /
            <a href="">محركات</a>
        </div>
    </div>
    <div class="block post_detail py-6 font-bold text-centers 2xl:grid gap-8 grid-cols-5">
        <x-show-post-card :post="$post" />
        <x-post-info-card :post="$post" />
    </div>
    <div class="block all_comments lg:w-full lg:mt-10">
        <livewire:create-comment :post="$post"/>
        <livewire:show-comments :post="$post" :key="time().$post->id"/>
    </div>
    <x-recommended-posts :post="$post" />


</div>
@endif
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

{{-- footer --}}
<x-footer :categories="$categories"/>
<x-bottom-nav />
@endsection
