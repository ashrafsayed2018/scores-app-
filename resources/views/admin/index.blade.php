@extends('layouts.app')

@section('content')

<div class="container mx-auto lg:w-2/3" style="height: 3000px">
    <h1 class="text-center font-bold">لوحة تحكم الادمن </h1>

    <div class="lg:w-1/6 fixed h-full bg-gray-800 text-white right-0 top-12">
        <ul>
            <li>
                <a href="{{ route('category.create') }}">عمل تصنيف رئيسي </a>
                <a href="{{ route('subcategory.create') }}">عمل تصنيف فرعي </a>
                <a href="{{ route('childcategory.create') }}">عمل تصنيف تحت الفرعي </a>
            </li>
        </ul>
    </div>
</div>

@endsection
