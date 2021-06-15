@extends('layouts.app')

@section('content')
<div class="container lg:w-2/3 mx-auto">
    <h1 class="text-center mb-5 text-lg">مرحبا بكم في صفحة عمل المقالات </h1>
{{--
    @foreach ($categories as $category)
       @if ($category->has('subcategories'))
       <ul class="nav nav-stacked cat-nav">
        <li>
            <a href="#">{{ $category['name'] }} </a>
                  @if($category->subcategories->count())
                    <ul>
                      @foreach($category->subcategories as $subcategory)
                        @if($subcategory->count())
                           <li class=""><a href="#">subcategory ::: {{$subcategory->name}}</a></li>
                        @endif
                      @endforeach
                    </ul>
                  @endif
         </li>
      @else
         <li><a href="#"><i class="fa fa-link"></i> <span>{{ $category_menu->category_name }}</span></a></li>
      @endif
      </ul>

    @endforeach --}}
    @livewire('check-post-form')
    <a href="/home" class="button button-green">رجوع</a>
</div>
@endsection
