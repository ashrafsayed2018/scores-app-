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
@endsection
