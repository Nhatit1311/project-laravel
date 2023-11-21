@extends('Client.master')
@section('tieu_de_menu')
    Quên Mật Khẩu
@endsection
@section('content')
<section class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="contact-form-wrap">
                    <div class="widget-title mb-50">
                        <h5 class="title">Quên Mật Khẩu</h5>
                    </div>
                    <div class="contact-form">
                        <form action="/reset-password" method="post">
                            @csrf
                            <div class="col-md-12">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input name="email" type="text" placeholder="Nhập vào địa chỉ email">
                            </div>
                            <div class="col-md-12">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn">Quên Mật Khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script>

    </script>
@endsection
