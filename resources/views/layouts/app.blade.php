@include('includes._header')

    <div id="app">
        <x-utilities.navbar />

        <main class="mt-36">
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

            }

            var referrer = document.getElementById('referrer');
            var btnCopy = document.getElementById('btnCopy');

            if(btnCopy != null) {

                btnCopy.onclick = function () {

                    // step 1 select the text

                    referrer.select()

                    // step 2 copy the text

                    document.execCommand('Copy');

                }
            }

        </script>
@include('includes._footer')
