<!doctype html>
<html lang="en">

<head>
    @include('AdminRocker.Share.css')
    @yield('css')
</head>

<body>
    <div class="wrapper">
        <div class="header-wrapper">
            <header>
                @include('AdminRocker.Share.header')
            </header>
            @include('AdminRocker.Share.menu')
        </div>
        <div class="page-wrapper">
            <div class="page-content">
                @yield('noi_dung')
            </div>
        </div>
        <div class="overlay toggle-icon"></div>
        <footer class="page-footer">
            <p class="mb-0">Copyright © @php echo date("Y");  @endphp. All right reserved.</p>
        </footer>
    </div>

    @include('AdminRocker.Share.js')
    @yield('js')
</body>

</html>
