<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>sharmadresses</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front_assets/imgs/theme/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('front_assets/css/custom.css') }}">

    <style>
        .my-custom-alert {
            width: 300px !important;
            /* Adjust the width as needed */
            height: 60px !important;
            /* Adjust the height as needed */
        }

        .my-custom-alert .swal2-popup {
            font-size: 1.2em;
            /* Adjust the font size if needed */
        }
        .my-custom-alert .swal2-title {
            margin-top: 4px;
    font-size: 20px; /* Adjust the font size as needed */
    color: #13f40f; /* Adjust the color if needed */
}

    </style>
</head>

<body>
    @include('user.inc.header')

    @section('front_container')

    @show


    @include('user.inc.footer')

    <!-- Vendor JS-->
    <script src="{{ asset('front_assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('front_assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('front_assets/js/main.js?v=3.3') }}"></script>
    <script src="{{ asset('front_assets/js/shop.js?v=3.3') }}"></script>
    <script src="{{ asset('front_assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function sou() {
            Swal.fire({
                position: "top-end",
                // icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    popup: 'my-custom-alert'
                }
            });

        }
    </script>
</body>

</html>
