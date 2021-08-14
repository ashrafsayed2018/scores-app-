@include('includes._header')

<x-utilities.navbar/>

<div class="mx-auto w-4/5 mt-32">
    <div class="flex justify-between items-center mt-4 w-full">
        <a href="{{ route('home') }}" class="text-xs text-gray-500">
            <i class="fa fa-arrow-right"></i>
            <span>الرجوع</span>
        </a>
        <div class="text-sm text-gray-500 felx justify-between items-center">
            <a href="">الرئيسيه</a>
            /
            <a href="">الفئات</a>
            /
            <a href="">محركات</a>
        </div>
    </div>
    <div class="flex">
        {{-- accordion --}}
        <x-accordion />
        {{-- category info --}}
        <div class="flex-1 w-full lg:w-4/5 pt-5">
          <div class="flex justify-between items-center mx-5">
              <p>{{ $childcategory->name }}</p>
              <span>إجمالي الإعلانات: {{ $childcategory->posts->count() }}</span>
          </div>
          {{-- subcategories slider --}}
          {{-- <div class="flex mt-5 mx-auto w-4/5" >
              <div class="owl-carousel owl-theme w-40">

                  @foreach ($subcategory->childcategories as $childcategory)
                  <div class="item text-center pl-0 pr-0 bg-white shadow-lg rounded-sm" style="width: auto; margin-left: 10px;">
                      <a href="{{ route('childcategory.show', $childcategory->slug) }}">
                          <h5>
                              <span itemprop="name">{{ $childcategory->name }}</span>
                              <meta itemprop="description" content="سياحة، سياحه، سفر، حجز تذاكر، تذاكر طيران، تأشيرات سفر، استخراج فيز، دول شنغن، تأشيرات دول، حجز فنادق، خدمات العمرة، فيز العمره، اسعار مميزة، ">
                          </h5>
                      </a>
                  </div>
                  @endforeach
              </div>
          </div> --}}
          {{-- posts grid --}}

          @forelse ($childcategory->posts as $post)
          <div class="lg:grid lg:grid-cols-12 lg:gap-5 my-8">
          <livewire:post-card :post="$post"  wire:key="$post->id" />
          </div>
          @empty
              <p class="button button-red my-8">لا توجد اعلانات في هذا التصنيف</p>
          @endforelse
        </div>
    </div>
</div>


@include('includes._footer')

