@extends('layouts.app')
{{-- <x-utilities.navbar /> --}}

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
<div class="main py-10 px-2 lg:p-10">
    {{-- our categories section  --}}
<div class="categories mt-8">
    <div class="container mx-auto">
        <h2 class="text-gray-600 font-bold text-lg mb-6">اكتشف <span class="text-blue-500">اقسامنا</span></h2>
        <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach ($categories as $category)

            <a href="{{ route('category.show', $category->slug) }}" class="bg-white rounded-md overflow-hidden transition-all hover:shadow-lg">
                <img class="w-full lazy h-40" src="{{ asset("storage/category_images/$category->image") }}" alt="Mountain">
                <div class="mx-4">
                    <div class="py-4">
                        {{ $category->name }}
                     </div>
                     <div class="pb-4 text-gray-600">
                        {{ $category->posts->count() }} اعلان
                     </div>
                </div>
            </a>
        @endforeach
        </div>
    </div>
</div>
{{-- add ad --}}
<div class="add-ad mt-8">
    <div class="container mx-auto">
        <h2 class="font-bold text-gray-600 text-lg mb-6">اضف اعلانك <span class="text-blue-500 font-bold">المثالي</span></h2>
        <div class="grid lg:grid-cols-3 gap-4">
            <div class="bg-blue-100 border-2  hover:border-blue-400 py-7 px-3 flex rounded-lg justify-center items-center gap-x-2">
                <div class="bg-white p-3  rounded-md">
                    <i class="fas fa-camera text-4xl text-blue-400"></i>
                </div>
                <p class="flex-1"> الصور/الفيديو الواضحة تزيد الدعم لإعلانك</p>
            </div>
            <div class="bg-red-100 border-2 hover:border-red-400 py-7 px-3 flex rounded-lg justify-center items-center gap-x-2">
                <div class="bg-white p-3 rounded-md">
                    <i class="far fa-sticky-note text-4xl text-blue-400"></i>
                </div>
                <p class="flex-1">تفاصيل أكثر تعني مشاهدات أكثر وظهور أسهل للإعلان</p>
            </div>
            <div class="bg-green-100 border-2 hover:border-green-400 py-7 px-3 rounded-lg flex justify-center items-center gap-x-2">
                <div class="bg-white p-3 rounded-md">
                    <i class="fas fa-rocket text-4xl text-blue-400"></i>
                </div>
                <p class="flex-1">إختيار أي من امتيازاتنا سوف تعطي إعلانك دعم أكثر لمشاهدته من قبل الملايين</p>
            </div>
        </div>
    </div>
</div>
{{-- why our website --}}
<div class="why-us mt-8">
    <h2 class="font-bold text-gray-600 text-lg mb-6"> لماذا <span class="text-blue-500 font-bold">نحن</span></h2>
    <div class="grid lg:grid-cols-3">
        <div class="text-center h-40 mb-6">
            <i class="fas fa-suitcase text-5xl text-green-500"></i>
            <h3 class="mt-3">اطلق اعلاناتك بسهولة</h3>
            <p class="mt-3 text-gray-500"> تنشيط وتعزيز وصول منشوراتك.</p>
        </div>
        <div class="text-center h-40 mb-6">
            <i class="fas fa-paper-plane text-5xl text-blue-500"></i>
            <h3 class="mt-3">وصول اعلانك اسرع</h3>
            <p class="mt-3 text-gray-500">اعلانك باستمرار على جوجل</p>
        </div>
        <div class="text-center h-40 mb-6">
            <i class="fas fa-credit-card text-5xl text-red-500"></i>
            <h3 class="mt-3">اعلانات مبوبه مجانيه </h3>
            <p class="mt-3 text-gray-500">لا تتطلب الاعلانات مصاريف اضافيه </p>
        </div>
        <div class="text-center h-40 mb-6">
            <i class="fas fa-users text-5xl text-purple-400"></i>
            <h3 class="mt-3">وصول لمستخدمين اكثر</h3>
            <p class="mt-3 text-gray-500">يتم نشر اعلانك على قوقل وعلى منضات وسائل التواصل </p>
        </div>
        <div class="text-center h-40 mb-6">
            <i class="fas fa-user-tie text-5xl text-gray-500"></i>
            <h3 class="mt-3">بناء علامه تجاريه</h3>
            <p class="mt-3 text-gray-500">ابني معنا علامتك التجاريه </p>
        </div>
        <div class="text-center h-40 mb-6">
            <i class="fas fa-money-check-alt text-5xl text-green-300"></i>
            <h3 class="mt-3">اعلانات غير مكلفه</h3>
            <p class="mt-3 text-gray-500">الاعلانات مجانيه مائه بالمائه وبدون رسوم دفع </p>
        </div>
    </div>
</div>
{{-- frequent question --}}
<div class="fq">

</div>
{{-- footer --}}
<x-footer :categories="$categories"/>
</div>
<x-bottom-nav />
@endsection
