@extends('layouts.app')

@section('content')

<div class="container mx-auto lg:w-full mt-8" style="height: 3000px">
    <h1 class="text-center font-bold">لوحة تحكم الادمن </h1>
    {{-- navigation --}}
    <div class="navigation fixed w-80 h-full bg-gray-700 text-white top-24 -mt-2  transition-all delay-50 overflow-hidden ">
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
                <a href="#" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fa fa-home text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>لوحة التحكم</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="#" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fa fa-users text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>المستخدمين</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="#" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fas fa-ad text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>الاعلانات</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="#" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="fas fa-folder text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>الفئات</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="#" class="flex w-full no-underline">
                    <span class="icon w-14 h-12 leading-none text-center ml-5">
                        <i class="far fa-folder-open text-xl"></i>
                    </span>
                    <span class="title px-2 h-12 whitespace-nowrap">
                        <h3>الفئات الفرعيه</h3>
                    </span>
                </a>
            </li>
            <li class="hover:bg-gray-600 px-5 py-2">
                <a href="#" class="flex w-full no-underline">
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
    <div class="admin-main absolute right-80 min-h-full mt-8 px-5  border-t-2 border-gray-200 transition-all delay-50">
        {{-- topbar --}}
        <div class="topbar w-full bg-white h-12 flex justify-between items-center">
            <div class="toggle w-14 h-14 relative" onclick="toggleMenu()">
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
        <div class="cardBox relative w-full grid md:grid-cols-2 my-10 xl:grid-cols-4 gap-5">
            <div class="card bg-white p-5 flex justify-between items-baseline cursor-pointer shadow-lg transition-all delay-50 hover:shadow-none">
                <div>
                    <div class="cardName text-gray-500 my-10">عدد المستخدمين</div>
                    <div class="numbers relative text-3xl font-medium">10,299</div>
                </div>
                <div class="icon text-4xl text-blue-400">
                    <i class="fa fa-users"></i>
                </div>
            </div>
            <div class="card bg-white p-5 flex justify-between items-baseline cursor-pointer shadow-lg transiton-all delay-50 hover:shadow-none">
                <div>
                    <div class="cardName text-gray-500 my-10">عدد الاعلانات</div>
                    <div class="numbers relative text-3xl font-medium">10,299</div>
                </div>
                <div class="icon text-4xl text-blue-400">
                    <i class="fa fa-ad"></i>
                </div>
            </div>
            <div class="card bg-white p-5 flex justify-between items-baseline cursor-pointer shadow-lg transiton-all delay-50 hover:shadow-none">
                <div>
                    <div class="cardName text-gray-500 my-10">عدد المشاهدات</div>
                    <div class="numbers relative text-3xl font-medium">10,299</div>
                </div>
                <div class="icon text-4xl text-blue-400">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
            <div class="card bg-white p-5 flex justify-between items-baseline cursor-pointer shadow-lg transiton-all delay-50 hover:shadow-none">
                <div>
                    <div class="cardName text-gray-500 my-10 ">عدد التعليقات</div>
                    <div class="numbers relative text-3xl font-medium">10,299</div>
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
                    <h3 class="text-center my-10 text-3xl border-b-2 border-blue-500 w-60 mx-auto pb-2">احدث المستخدمين</h3>
                    <a href="" class="button button-green">عرض الكل</a>
                </div>
                <table class="sm:w-96 sm:overflow-auto lg:min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            email
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Role
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                              </div>
                              <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                              </div>
                              <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                              </div>
                              <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                              </div>
                              <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                              </div>
                              <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>

            <div class="recentAds">
                <div class="cardHeader">
                    <h3 class="text-center my-10 text-3xl border-b-2 border-blue-500 w-60 mx-auto pb-2">احدث الاعلانات</h3>
                    <a href="" class="button button-green">عرض الكل</a>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          title
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          author
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          status
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                          views
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                              </div>
                              <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                              </div>
                              <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                              </div>
                              <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                              </div>
                              <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                      <tr class="hover:bg-gray-200">
                        <td class="px-6 py-4 whitespace-nowrap ">
                          <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                            </div>
                            <div class="ml-4">
                              <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                              </div>
                              <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                          <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                          </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                          Admin
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
