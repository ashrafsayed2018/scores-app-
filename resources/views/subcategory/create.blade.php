@extends('layouts.app')

@section('content')
<div class="container lg:w-2/3 mx-auto">
    <h1 class="text-center mb-5 text-lg">مرحبا بكم في صفحة عمل التصنيفات الفرعيه </h1>

    <div>
        <form action="{{ route('subcategory.store') }}" method="POST" class="text-right bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 my-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                   اسم التصنيف الفرعي
                  </label>
                  <input
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                  id="name"
                  type="text"
                  name="name"
                  value="{{ old('name') }}"
                  placeholder=" اسم التصنيف الفرعي">
                  @error('name')

                  <span class="text-red-500 ">{{ $message }}</span>

                  @enderror
            </div>

            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="image">
                  صورة التصنيف الفرعي
                  </label>
                  <input
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                  id="image"
                  type="file"
                  name="image"
                  value="{{ old('image') }}"
                  placeholder="صورة  التصنيف">
                  @error('image')

                  <span class="text-red-500">{{ $message }}</span>

                  @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="category">
                        التصنيف الرئيسي
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                    id="category"
                    type="text"

                    name="category_id">
                    <option value="">اختر التصنيف الرئيسي</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id ==  old('category_id') ? "selected" : "" }}>
                        {{$category->name }}
                    </option>


                    @endforeach
                </select>
                @error('category_id')

                <span class="text-red-500">{{ $message }}</span>

                @enderror
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        اضافه
                </button>
            </div>
        </form>
     </div>
    <a href="{{ route('admin.index') }}" class="button button-green">رجوع</a>
</div>
@endsection
