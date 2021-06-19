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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="bg-white shadow border border-gray-300 py-3">
            <div class="container mx-auto flex justify-between">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="flex justify-between">
                                <a href="{{ route('profile.show',current_user()->username) }}"
                                    id="navbarDropdown"
                                    class="block mx-4 flex justify-between items-center"
                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="ml-3"> {{ current_user()->username }}</span>
                                    {{-- <img src="{{ asset('storage/images/'. auth()->user()->profile->image) }}"
                                    alt="profile image"
                                    style="width:20px;height:20px;border-radius:50%"> --}}
                                </a>

                                <div>
                                    <a class="block" href="{{ route('logout') }}"
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts
        <!-- Scripts -->
        {{-- <script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script> --}}
        <script src="{{ asset('js/app.js') }}"></script>

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
