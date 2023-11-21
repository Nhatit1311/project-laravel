<!doctype html>
<html class="no-js" lang="">
    <head>
        @include('Client.share.css')
    </head>
    <body>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        @include('Client.share.header')
        <!-- header-area-end -->


        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section class="breadcrumb-area breadcrumb-bg" data-background="/assets_client/img/bg/breadcrumb_bg.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb-content">
                                <h2 class="title">NguyenPhap <span>Cinema</span></h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">@yield('tieu_de_menu')</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @yield('content')

        </main>
        <!-- main-area-end -->


        <!-- footer-area -->
        @include('Client.share.footer')
        <!-- footer-area-end -->





		@include('Client.share.js')
        @yield('js')
    </body>
</html>
