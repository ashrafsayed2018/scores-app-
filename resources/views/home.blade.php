@extends('layouts.app')

@section('content')
<div class="container lg:w-2/3 mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <h1 class="text-center mb-5 text-lg">مرحبا بك في موقع اعلانات ونقاط</h1>

             <div class="flex justify-center items-start bg-white shadow-lg px-3 py-3 max-h-screen h-96">
                 @if (!auth()->user()->profile)
                    <button class="button button-blue mx-5 focus:outline-none">
                        <a href="{{ route('profile.create') }}"> اضافة ملف</a>
                    </button>
                  @else
                  <button class="button button-blue mx-5 focus:outline-none">
                    <a href="{{ route('profile.edit',[auth()->user()->profile->username]) }}">تحديث الملف </a>
                 </button>
                 @endif
                 <button class="button button-green mx-5 focus:outline-none">
                    <a href="{{ route('post.create') }}"> اعلان</a>
                 </button>
                 <button class="button button-darkgreen mx-5 focus:outline-none">
                    <a href="{{ route('explore.index') }}"> الاعضاء</a>
                 </button>
                 <button class="button  button-yellow mx-5 focus:outline-none">
                    <a href="{{ route('post.index') }}"> الاعلانات</a>
                 </button>
             </div>
        </div>
    </div>
</div>
@endsection
