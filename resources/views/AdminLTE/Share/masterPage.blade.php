<!DOCTYPE html>
<html lang="en">

<head>
    @include('AdminLTE.Share.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('AdminLTE.Share.header')

        @include('AdminLTE.Share.menu')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            @yield('title')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        @include('AdminLTE.Share.footer')
    </div>

    @include('AdminLTE.Share.js')
    @yield('js')
</body>

</html>
