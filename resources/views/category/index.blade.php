@extends('layouts.app')

@section('content')

<div class="container mx-auto lg:w-2\3">
    <h1 class="text-center font-bold mx-auto mb-6">صفحة التصنيفات</h1>

            @forelse ($categories as $category)
            <table class="table-auto mx-auto shadow-lg  rounded-lg">
                <thead>
                    <tr>
                        <td class="border border-gray-400 px-3 py-2">
                           التسلسل
                        </td>
                        <td class="border border-gray-400 px-3 py-2">
                            اسم التصنيف
                        </td>
                        <td class="border border-gray-400 px-3 py-2">
                            صورة التصنيف
                        </td>
                        <td class="border border-gray-400 px-3 py-2">
                           تحديث
                        </td>
                        <td class="border border-gray-400 px-3 py-2">
                            حذف
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr >
                        <td class="border border-gray-400 px-3 py-2">
                            {{ $category->id}}
                        </td>
                        <td class="border border-gray-400 px-3 py-2">
                            {{ $category->name}}
                        </td>
                        <td class="border border-gray-400 px-3 py-2">
                            <img src="{{ asset('/storage/category_images/'. $category->image) }}" alt="category image" class="w-10 h-10 shadow-lg rounded-full">
                        </td>
                        <td class="border border-gray-400 px-3 py-2">
                            <a href="{{ route('category.edit', $category->id) }}" class="button button-green">تحديث</a>
                        </td>
                        <td class="border border-gray-400 px-3 py-2">
                            <a href="{{ route('category.destroy', $category->id) }}" class="button button-red">حذف</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            @empty
            <tr>
                <td>لا توجد تصنيفات حتي الان</td>
            </tr>
            @endforelse


</div>

@endsection
