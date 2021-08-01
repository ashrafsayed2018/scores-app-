@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <h1 class="text-center mb-5 text-lg my-8">انشاء الملف الشخصي </h1>
     <div class="lg:w-2/5 mx-auto">
        <form action="{{ route('profile.store', $user->slug) }}" method="POST" class="text-right bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 my-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                    اسم المستخدم
                  </label>
                  <input
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                  id="name"
                  type="text"
                  name="name"
                  value="{{ old('name') }}"
                  placeholder="الاسم">
                  @error('name')

                  <span class="text-red-500 ">{{ $message }}</span>

                  @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="about">
                    نبذه عني
                  </label>
                  <textarea
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                  id="about"
                  type="text"
                  name="about"
                  placeholder="نبذه عني">{{ old('about') }}</textarea>
                  @error('about')

                  <span class="text-red-500">{{ $message }}</span>

                  @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="image">
                    الصوره الشخصيه
                  </label>
                  <input
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                  id="image"
                  type="file"
                  name="image"
                  value="{{ old('image') }}"
                  placeholder="صورة الملف الشخصي">
                  @error('image')

                  <span class="text-red-500">{{ $message }}</span>

                  @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="phone">
                    رقم التليفون
                </label>
                <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                id="phone"
                type="text"

                value="{{ old('phone') }}"
                name="phone"
                placeholder="رقم التليفون">
                @error('phone')

                <span class="text-red-500">{{ $message }}</span>

                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="age">
                    العمر
                </label>
                <input
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                  id="age"
                  type="text"
                  name="age"
                  value="{{ old('age') }}"
                  placeholder="العمر">
                  @error('age')

                  <span class="text-red-500">{{ $message }}</span>

                  @enderror
            </div>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="gender">
                        الجنس
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                    id="gender"
                    type="text"

                    name="gender">
                    <option value="">اختر الجنس</option>
                    <option value="male" @if (old('gender') == 'male')
                        selected
                    @endif>ذكر</option>
                    <option value="female" @if (old('gender') == 'female')
                    selected
                @endif>انثى</option>
                </select>
                @error('gender')

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
</div>
@endsection
