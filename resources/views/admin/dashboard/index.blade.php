@extends('layouts.app')

@section('content')

<div class="container mx-auto lg:w-full " style="height: 3000px">
    {{-- navigation --}}
    <div class="navigation fixed w-80 h-full bg-gray-700 text-white top-24 -mt-2  transition-all delay-50 overflow-hidden" style="z-index: 1000000000000;">
        <ul class="absolute top-0 left-0 w-full pt-10">
            <li class="px-5 py- mb-6">
                <a href="#" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fab fa-apple text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>روجلي</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="{{ route('dashboard.index') }}" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fa fa-home text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>لوحة التحكم</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="{{ route('admin.users') }}" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fa fa-users text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>المستخدمين</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="{{ route('admin.posts') }}" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fas fa-ad text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>الاعلانات</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="{{ route('category.create') }}" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fas fa-folder text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>الفئات</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="{{ route('subcategory.create') }}" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="far fa-folder-open text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>الفئات الفرعيه</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="{{ route('childcategory.create') }}" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="far fa-copy text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>الفئات تحت الفرعيه</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="#" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fas fa-cog text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>الاعدادات</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="#" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fas fa-sign-out-alt transform -rotate-180 text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>خروج</h3>
                    </span>
                </a>
            </li>
        </ul>
    </div>

    {{-- main  --}}
    @role('Admin')
    <div class="admin-main absolute right-80  top-36 min-h-full px-5 transition-all delay-50">
        <h1 class="text-center font-bold mb-4">لوحة تحكم الادمن </h1>

        {{-- topbar --}}
        <div class="topbar w-full bg-white h-12 flex justify-between items-center sticky ">
            <div class="toggle w-14 h-14 relative cursor-pointer" onclick="toggleMenu()">
            </div>
            <div class="search relative w-96 mx-3">
                <label for="search" class="relative w-full">
                    <input type="text" class="w-full h-10 rounded-3xl py-2 px-5 outline-none border-2 border-gray-300" id="search" placeholder="ابحث هنا ...">
                    <i class="fas fa-search absolute top-1 left-3 text-gray-300 cursor-pointer"></i>
                </label>
            </div>
            <div class="user w-10 h-10 relative  overflow-hidden rounded-full cursor-pointer">
                <img src="{{ asset('storage/images/avatar.jpg') }}" class="absolute w-full h-full top-0 left-0 object-cover" alt="user iamge">
            </div>
        </div>
        {{-- card box --}}
        <div class="cardBox relative w-full grid md:grid-cols-2 my-16 xl:grid-cols-4 gap-5">
            <div class="card bg-white p-5 flex justify-between items-baseline cursor-pointer shadow-lg transition-all delay-50 hover:shadow-none">
                <div>
                    <div class="cardName text-gray-500 my-10">عدد المستخدمين</div>
                    <div class="numbers relative text-3xl font-medium">
                        {{ $users->count() }}
                    </div>
                </div>
                <div class="icon text-4xl text-blue-400">
                    <i class="fa fa-users"></i>
                </div>
            </div>
            <div class="card bg-white p-5 flex justify-between items-baseline cursor-pointer shadow-lg transiton-all delay-50 hover:shadow-none">
                <div>
                    <div class="cardName text-gray-500 my-10">عدد الاعلانات</div>
                    <div class="numbers relative text-3xl font-medium">
                        {{ $posts->count() }}
                    </div>
                </div>
                <div class="icon text-4xl text-blue-400">
                    <i class="fa fa-ad"></i>
                </div>
            </div>
            <div class="card bg-white p-5 flex justify-between items-baseline cursor-pointer shadow-lg transiton-all delay-50 hover:shadow-none">
                <div>
                    <div class="cardName text-gray-500 my-10">عدد المشاهدات</div>
                    <div class="numbers relative text-3xl font-medium">{{ $totalViews }}</div>
                </div>
                <div class="icon text-4xl text-blue-400">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
            <div class="card bg-white p-5 flex justify-between items-baseline cursor-pointer shadow-lg transiton-all delay-50 hover:shadow-none">
                <div>
                    <div class="cardName text-gray-500 my-10 ">عدد التعليقات</div>
                    <div class="numbers relative text-3xl font-medium">{{ $totalComments }}</div>
                </div>
                <div class="icon text-4xl text-blue-400">
                    <i class="fa fa-comment"></i>
                </div>
            </div>
        </div>
        {{-- details --}}
        <div class="details">
            <div class="recentUsers">
                <div class="cardHeader">
                    <h3 class="text-center my-16 text-3xl border-b-2 border-blue-500 w-60 mx-auto pb-2">احدث المستخدمين</h3>
                    <a href="{{ route('admin.users') }}" class="button button-green my-8 inline-block">عرض الكل</a>
                </div>
                <table class="sm:w-96 sm:overflow-auto lg:min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        الاسم والايميل
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            عضو منذ
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            عدد الاعلانات
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                         الحاله
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          الصلاحيات
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                             التعليقات
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            الاعجابات
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                         تعديل
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                    @forelse ($lastWeekUsers as $user)
                    <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 ml-3">
                              <img class="h-10 w-10 rounded-full" src="{{ $user->imagePath() }}" alt="{{ $user->name }}" title="{{ $user->name }}">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                {{ $user->name }}
                              </div>
                              <div class="text-sm text-gray-500">
                                {{ $user->email }}
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $user->created_at->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">{{ $user->posts->count() }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        @if ($user->email_verified_at != null)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            مفعل
                        </span>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            غير مفعل
                        </span>
                        @endif

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->getRoleNames()->first() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->comments()->count() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->likes()->count() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">تعديل</a>
                        </td>
                      </tr>
                    @empty

                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="recentAds">
                <div class="cardHeader">
                    <h3 class="text-center my-16 text-3xl border-b-2 border-blue-500 w-60 mx-auto pb-2">احدث الاعلانات</h3>
                    <a href="{{ route('admin.posts') }}" class="button button-green my-8 inline-block">عرض الكل</a>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          العنوان
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            تشر منذ
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          صاحب الاعلان
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          الحاله
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          المشاهدات
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            تعديل
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                        @forelse ($lastWeekPosts as $post)
                        <tr class="hover:bg-gray-200">
                            <td class="px-6 py-4 whitespace-nowrap ">
                              <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 ml-3">
                                  <img class="h-10 w-10 rounded-full" src="{{asset(firstPostImage($post))}}" alt="">
                                </div>
                                <div class="ml-4">
                                  <div class="text-sm font-medium text-gray-900">
                                    {{ $post->title }}
                                  </div>
                                  <div class="text-sm text-gray-500">
                                    {{ $post->description }}
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $post->created_at->diffForHumans() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-900">{{ $post->user->name }}</div>
                              <div class="text-sm text-gray-500">{{ $post->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              {{-- <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                عير مفعل
                              </span> --}}

                              <livewire:toggle-button :model="$post" field="active" key="{{ $post->id }}" />


                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              {{ $post->view_count }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                              <a href="#" class="text-indigo-600 hover:text-indigo-900">تعديل</a>
                            </td>
                          </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
   @endrole
</div>

@endsection
<script>
    // toggle manue

    function toggleMenu() {
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        toggle.classList.toggle('active')
        navigation.classList.toggle('active')

    }
</script>
