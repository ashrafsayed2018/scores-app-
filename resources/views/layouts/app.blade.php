<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

        <!-- Scripts -->
        <script src="{{ asset(mix('js/app.js')) }}" defer data-turbolinks-track="reload"></script>
        <livewire:scripts/>
        @stack('scripts')

        <!-- Styles -->
        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet" data-turbolinks-track="reload">
        <livewire:styles/>
        @stack('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="bg-white lg:bg-transparent lg:text-white shadow border lg:shadow-none relative border-gray-300 lg:border-none py-3 z-10">
            <div class="container mx-auto flex justify-between">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                           @if (request()->is('login'))
                           <li class="nav-item">
                                <a class="nav-link button button-blue" href="{{ route('register') }}">{{ __('Register') }}</a>
                           </li>
                            @elseif (request()->is('register'))
                            <li class="nav-item">
                                <a class="nav-link button button-green" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                            @endif
                        @else
                            <li class="flex justify-between">
                                <a href="{{ route('profile.show',current_user()->username) }}"
                                    id="navbarDropdown"
                                    class="mx-2 flex justify-between items-center"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span> {{ current_user()->username }}</span>
                                </a>
                                <div class="flex">
                                    <a class="nav-link mx-2 button button-blue" href="{{ route('post.create') }}">
                                      <i class="fas fa-plus text-sm  text-white"></i>
                                        ارفع اعلان
                                    </a>
                                    <a class="block button button-red" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
        <!-- Scripts -->
        {{-- <script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script> --}}

        <script>

            window.onload = function() {


                        $('#categoryList').on('change', function () {
                        $("#subcategoryList").attr('disabled', false); //enable subcategory select
                        $("#subcategoryList").val("");
                        $(".subcategory").attr('disabled', true); //disable all category option
                        $(".subcategory").hide(); //hide all subcategory option
                        $(".parent-" + $(this).val()).attr('disabled', false); //enable subcategory of selected category/parent
                        $(".parent-" + $(this).val()).show();


                    });


                    $('#subcategoryList').on('change', function () {
                        $("#childcategoryList").attr('disabled', false); //enable subcategory select
                        $("#childcategoryList").val("");
                        $(".childcategory").attr('disabled', true); //disable all category option
                        $(".childcategory").hide(); //hide all subcategory option
                        $(".parent-" + $(this).val()).attr('disabled', false); //enable subcategory of selected category/parent
                        $(".parent-" + $(this).val()).show();


                    });
                    // var categoryList = document.getElementById('categoryList');
                    // console.log(categoryList)
                    // var subcategoryList = document.getElementById('subcategoryList');
                    // console.log(categoryList)
                    // categoryList.addEventListener('change' , function () {
                    //     alert('changed')
                    // })
            }
        </script>
</body>
</html>
