@include('includes._header')

    <div id="app">
        <nav class="bg-white lg:text-gray-900 shadow border lg:shadow-none relative border-gray-300 lg:border-none py-3 z-10">
            <div class="container mx-auto flex justify-between">
                <div class="flex w-1/4 items-center justify-between">
                    <a class="navbar-brand inline-block" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <a href="/notifications" class="relative">
                        <span class="notification_count absolute -top-2 left-3">{{ auth()->user()->unreadNotifications->count() }}</span>
                        <i class="fa fa-bell text-red-500"></i>
                    </a>
                </div>

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
                                    <a class="nav-link mx-2 lg:button lg:button-blue" href="{{ route('post.create') }}">
                                      <i class="fas fa-plus text-xs lg:text-sm text-white"></i>
                                        ارفع اعلان
                                    </a>
                                    <a class="block sm-button lg:button button-red text-xs text-white" href="{{ route('logout') }}"
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
@include('includes._footer')
