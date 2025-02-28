<!DOCTYPE html>
<html lang="en" class="light-style" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/"data-template="vertical-menu-template-bordered">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta
        name="viewport"content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Guesty | @yield('title')</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/backend/img/favicon/favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet" />
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/fonts/boxicons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/fonts/flag-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/css/rtl/core.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/css/rtl/theme-default.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/css/demo.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/typeahead-js/typeahead.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('assets/backend/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('assets/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('assets/backend/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('assets/backend/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/apex-charts/apex-charts.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/sweetalert2/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/select2/select2.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/spinkit/spinkit.css')}}">
    <script src="{{ URL::asset('assets/backend/vendor/js/helpers.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/config.js') }}"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar  ">
        <div class="layout-container">
            @include('admin.layouts.sidebar')
            <div class="layout-page">
                @include('admin.layouts.navbar')
                <div class="content-wrapper">
                    @yield('content')
                    @include('admin.layouts.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>
    @stack('plugin-scripts')
    <script src="{{ URL::asset('assets/backend/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/js/menu.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/main.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/dashboards-analytics.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}">
    </script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}">
    </script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/toastr/toastr.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/vendor/libs/select2/select2.js')}}"></script>
    @stack('js')
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>
    @if (session()->has('success'))
        <script type="text/javascript">
            $(function() {
                toastr.success("{{ session()->get('success') }}");
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script type="text/javascript">
            $(function() {
                toastr.error("{{ session()->get('error') }}");
            });
        </script>
    @endif
</body>

</html>
