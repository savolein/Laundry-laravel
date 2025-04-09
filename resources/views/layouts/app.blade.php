<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cuci Cuy')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Sweet Alert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #87CEEB; /* Sky Blue */
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;
        }
        .navbar-brand:hover, .navbar-nav .nav-link:hover {
            color: #FFD700; /* Bumblebee Yellow */
        }
        .sidebar {
            min-height: 100vh;
            width: 250px; /* Lebar sidebar tetap */
            background-color: #87CEEB; /* Sky Blue */
            position: fixed;
            color: #fff;
        }
        .sidebar .nav-link {
            color: #fff;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background-color: #FFD700; /* Bumblebee Yellow */
            color: #000;
        }
        .content-wrapper {
            margin-left: 250px; /* Margin kiri sesuai dengan lebar sidebar */
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #FFD700; /* Bumblebee Yellow */
            color: #000;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        @media (max-width: 767.98px) {
            .sidebar {
                width: 100%;
                position: relative;
                margin-bottom: 20px;
            }
            .content-wrapper {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        @if (Request::is('admin*'))
            @include('layouts.partials.navbar')
        @endif

        <div class="d-flex pt-5 ">
            @if (Request::is('admin*'))
                @include('layouts.partials.sidebar')
            @endif

            <!-- Content Wrapper -->
            <div id="page-content-wrapper" class="w-100 p-4 content-wrapper">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Sweet Alert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>