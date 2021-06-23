@extends('layouts.app')

@section('content')

<div class="container mx-auto">
    <h1 class="text-center mb-5 text-lg">صفحة تعديل الملف الشخصي </h1>

     <div class="lg:w-2/3 mx-auto">

        <form action="{{ route('profile.update', $profile->username) }}" method="POST" class="text-right bg-white shadow-lg rounded px-8 py-8 my-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                    اسم المستخدم
                  </label>
                  <input
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
                  id="username"
                  type="text"
                  name="username"
                  value="{{$profile->username}}"
                  placeholder="الاسم">
                  @error('username')

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
                  placeholder="نبذه عني">{{$profile->about}}</textarea>
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
                  <img src="{{ asset('storage/users_images/'.$profile->image) }}" alt="profile image" style="width:80px;height:80px">
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
                  value="{{ $profile->age }}"
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
                    <option value="male" @if ($profile->gender  == 'male')
                        selected
                    @endif>ذكر</option>
                    <option value="female" @if ($profile->gender == 'female')
                    selected
                @endif>انثى</option>
                </select>
                @error('gender')

                <span class="text-red-500">{{ $message }}</span>

                @enderror
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-green-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        تحديث
                </button>
            </div>
        </form>
     </div>
    <a href="/home" class="button button-green">back</a>
</div>
@endsection
