<!DOCTYPE html>
<html lang="en" data-bs-theme="white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelola Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- FEATHER ICONS   -->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a class="fs-5" href="#">Pengelolaan Surat</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{ route('dashboard') }}" class="sidebar-link">
                            <i class="ri-dashboard-line"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#userPages"
                            data-bs-toggle="collapse" aria-expanded="false"><i class="ri-bubble-chart-line"></i>
                            Data Guru
                        </a>
                        <ul id="userPages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{ route('guru.index') }}" class="sidebar-link mx-4"><i
                                        class="ri-table-fill"></i> Data Guru</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="{{ route('user.index') }}" class="sidebar-link mx-4"><i
                                        class="ri-table-fill"></i>
                                    Data Staff Tu</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#suratPages"
                            data-bs-toggle="collapse" aria-expanded="false"><i class="ri-bubble-chart-line"></i>
                            Data Surat
                        </a>
                        <ul id="suratPages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="{{route('lettertype.index')}}" class="sidebar-link mx-4"><i class="ri-table-fill"></i> Data
                                    Klasifikasi Surat</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link mx-4"><i class="ri-table-fill"></i> Data Surat</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{-- Hello {{ auth()->user()->name }} --}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <form action="/logout" method="post">
                                    @csrf
                                   <button type="submit" class="dropdown-item">
                                    Logout
                                   </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container mt-5">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/nav.js') }}"></script>
</body>

</html>
