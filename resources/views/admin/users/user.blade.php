@extends('layouts.app')

@section('content')

<div class="container mx-auto lg:w-full mt-8" style="height: 3000px">

            {{-- card box --}}
            <div class="cardBox relative w-full grid md:grid-cols-2 my-16 xl:grid-cols-4 gap-5">
                <div class="card bg-white p-5 flex justify-between items-baseline cursor-pointer shadow-lg transiton-all delay-50 hover:shadow-none">
                    <div>
                        <div class="cardName text-gray-500 my-10">عدد الاعلانات</div>
                        <div class="numbers relative text-3xl font-medium">
                            {{ $user->posts->count() }}
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
                <div class="card bg-white p-5 flex justify-between items-baseline cursor-pointer shadow-lg transiton-all delay-50 hover:shadow-none">
                    <div>
                        <div class="cardName text-gray-500 my-10 "> عدد الزائرين عن طريق الرابط</div>
                        <div class="numbers relative text-3xl font-medium">{{ $totalReferal }}</div>
                    </div>
                    <div class="icon text-4xl text-blue-400">
                        <i class="fa fa-link"></i>
                    </div>
                </div>
            </div>

    <livewire:user-posts-table :posts="$posts" />

</div>
@endsection
