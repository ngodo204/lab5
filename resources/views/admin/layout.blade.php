<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        @yield('style-libs')
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
    </head>
    <body>
        <!-- Làm layout trang admin -->

        <!-- 1.Khu vực header(navbar) -->
        <!-- A grey horizontal navbar that becomes vertical on small screens -->
        <nav class="navbar navbar-expand-sm bg-light navbar-dark shadow p-3">
            <div class="container-fluid">
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="d-flex text-decoration-none" href="#">
                            <img src="../img/avatar.jpg" alt="" class="rounded-circle" style="height: 50px" />
                            <h1 class="ms-4">Admin</h1>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-primary fw-bold" href="#">Xin chào "admin"</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary fw-bold" href="#">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Khu vực nội dung -->
        <!-- Thực hiện căn chỉnh bố cụv -->
            <!--3. Bên phải nội dung chính -->
            <div class="container">
                @yield('content')
            </div>
        </div>
        @yield('script-libs')
    </body>
</html>
