<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="horizontal-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Guesty | @yield('title')</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/backend/img/favicon/favicon.ico')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/fonts/boxicons.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/fonts/fontawesome.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/fonts/flag-icons.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/css/rtl/core.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/css/rtl/theme-default.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/typeahead-js/typeahead.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('assets/backend/vendor/css/pages/page-auth.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="{{ URL::asset('assets/backend/vendor/js/helpers.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/js/template-customizer.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/js/config.js')}}"></script>
</head>

<body>
  <div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">
        @yield('content')
    </div>
  </div>
  @stack('plugin-scripts')
  <script src="{{ URL::asset('assets/backend/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/js/bootstrap.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/libs/hammer/hammer.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/libs/i18n/i18n.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/libs/typeahead-js/typeahead.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/js/menu.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/js/main.js')}}"></script>
  <script src="{{ URL::asset('assets/backend/js/pages-auth.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  @stack('js')
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