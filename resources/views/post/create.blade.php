@extends('layouts.app')

@section('content')
<div class="container lg:w-2/3 mx-auto">
    <h1 class="text-center mb-5 text-lg">مرحبا بكم في صفحة عمل المقالات </h1>
    @livewire('create-post-form')
    <a href="/home" class="button button-green">رجوع</a>


</div>

@endsection

