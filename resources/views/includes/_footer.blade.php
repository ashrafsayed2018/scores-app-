    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    <livewire:scripts/>

    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                    margin:10,
                    nav:true,
                    //center: true,
                    loop:false,
                    rtl: true,
                    autoWidth:true,
                    items:3
            })
        })
    </script>
</body>
</html>
