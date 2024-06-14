<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ເຂົ້າສູ່ລະບົບ</title>
    <link rel="stylesheet" href="{{ asset('backend/plugins/flag-icon-css/css/flag-icon.min.css') }}">
    @if (!empty($about))
        <link rel="icon" type="image/png" href="{{ asset($about->logo) }}" />
    @else
        <link rel="icon" type="image/png" href="{{ asset('logo/noimage.jpg') }}" />
    @endif
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        nav svg {
            height: 20px;
        }

        @font-face {
            font-family: 'Noto Sans Lao';
            src: url('{{ asset('fonts/NotoSansLao-Medium.ttf') }}');
        }
        body {
    /* Gradient background */
    background:
                /* Image background */
                url('https://scontent.fvte1-1.fna.fbcdn.net/v/t39.30808-6/308158724_540419537887303_5059208229703567722_n.jpg?stp=dst-jpg_s960x960&_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeE9RYmT3rLMAbZ5qIyrrTtgA3aJJFJEMCgDdokkUkQwKJkE_AAgaOucXlAFJXDvMeHuSRgI3iPwnAp26BN4nrUl&_nc_ohc=m3tuQPhapMcQ7kNvgEzUlel&_nc_zt=23&_nc_ht=scontent.fvte1-1.fna&oh=00_AYA3rhFj6WBUATISW94NNoDAn3oZeZD6daZa_Ys90396cA&oe=66715E9E') center center no-repeat;
    /* Fallback background color (in case the image fails to load) */
    background-color: #000000;
    /* Background size (cover to fill the entire body) */
    background-size: cover;
    /* Ensures content is above the background */
    z-index: -1;
}

        /* body {
            background-image: linear-gradient(#d7e817, #484945);
            background-color: #000000;
        } */
    </style>
    @livewireStyles
</head>

<body class="hold-transition login-page" style="font-family: 'Noto Sans Lao'">
    {{ $slot }}
    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.js') }}"></script>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @livewireScripts
    @include('layouts.backend.script')
    @stack('scripts')
</body>

</html>
