@extends('layouts.app')

@section('content')

{{-- hero section --}}
<div class="hero lg:-mt-20 bg-hero-lg bg-cover bg-no-repeat bg-center" style="height: 400px">

    <div class="container mx-auto w-100 relative">

        <div class="hero-content absolute top-60 lg:w-2/5">
            <p class="text-white"> بيع ، إشتري او إستأجر علي المنصة الأولى</p>
            <h2 class="text-white font-bold text-3xl"> للتجارة الإلكترونية في الكويت </h2>
             {{-- search component --}}
             <x-utilities.search />

        </div>

   </div>

</div>
{{-- our categories section  --}}
<div class="categories mt-8">
    <div class="container mx-auto">
        <h2 class="text-gray-600 font-bold text-lg">اكتشف <span class="text-blue-500">اقسامنا</span></h2>
        <div class="p-10 grid md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach ($categories as $category)

            <div class="rounded overflow-hidden shadow-lg pr-2">
                <img class="w-full lazy h-40" src="{{ asset("storage/category_images/$category->image") }}" alt="Mountain">
                <div class="py-4">
                   {{ $category->name }}
                </div>
                <div class="pb-4 text-gray-600">
                   1166 اعلان
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
{{-- add ad --}}
<div class="add-ad mt-8">
    <div class="container mx-auto">
        <h2 class="font-bold">اضف اعلانك <span class="text-blue-500 font-bold">المثالي</span></h2>
        <div class="p-10 grid lg:grid-cols-3 gap-4">
            <div class="bg-blue-100 py-7 px-3 flex rounded-lg justify-center items-center gap-x-2">
                <div class="bg-white p-3  rounded-md">
                    <i class="fas fa-camera text-4xl text-blue-400"></i>
                </div>
                <p>الصور/الفيديو الواضحة تزيد الدعم لإعلانك</p>
            </div>
            <div class="bg-red-100 py-7 px-3 flex rounded-lg justify-center items-center gap-x-2">
                <div class="bg-white p-3 rounded-md">
                    <i class="far fa-sticky-note text-4xl text-blue-400"></i>
                </div>
                <p>تفاصيل أكثر تعني مشاهدات أكثر وظهور أسهل للإعلان</p>
            </div>
            <div class="bg-green-100 py-7 px-3 rounded-lg flex justify-center items-center gap-x-2">
                <div class="bg-white p-3 rounded-md">
                    <i class="fas fa-rocket text-4xl text-blue-400"></i>
                </div>
                <p>إختيار أي من امتيازاتنا سوف تعطي إعلانك دعم أكثر لمشاهدته من قبل الملايين</p>
            </div>
        </div>
    </div>
</div>
{{-- footer --}}
<x-footer :categories="$categories"/>
{{-- <div class="container lg:w-2/3 mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <h1 class="text-center mb-5 text-lg">مرحبا بك في موقع اعلانات ونقاط</h1>

             <div class="flex justify-center items-start bg-white shadow-lg px-3 py-3 max-h-screen h-96">
                 @if (!auth()->user()->profile)
                    <button class="button button-blue mx-5 focus:outline-none">
                        <a href="{{ route('profile.create') }}"> اضافة ملف</a>
                    </button>
                  @else
                  <button class="button button-blue mx-5 focus:outline-none">
                    <a href="{{ route('profile.edit',[auth()->user()->profile->user->slug]) }}">تحديث الملف </a>
                 </button>
                 @endif
                 <button class="button button-green mx-5 focus:outline-none">
                    <a href="{{ route('post.create') }}"> اعلان</a>
                 </button>
                 <button class="button button-darkgreen mx-5 focus:outline-none">
                    <a href="{{ route('explore.index') }}"> الاعضاء</a>
                 </button>
                 <button class="button  button-yellow mx-5 focus:outline-none">
                    <a href="{{ route('post.index') }}"> الاعلانات</a>
                 </button>
             </div>
        </div>
    </div>
</div> --}}
@endsection
