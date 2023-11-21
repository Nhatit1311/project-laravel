@extends('Client.master')
@section('tieu_de_menu')
    Đăng Nhập
@endsection
@section('content')
<section class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="contact-form-wrap">
                    <div class="widget-title mb-50">
                        <h5 class="title">Đăng Nhập</h5>
                    </div>
                    <div class="contact-form">
                        <form method="post" action="/login">
                        @csrf
                            <div class="col-md-12">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input name="email" type="email"  placeholder="Nhập vào email">
                            </div>
                            <div class="col-md-12">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input name="password" type="password"  placeholder="Nhập vào mật khẩu">
                            </div>
                            <div class="col-md-12">
                                {!! NoCaptcha::renderJs() !!}
				                {!! NoCaptcha::display() !!}
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn">Đăng Nhập</button>
                                </div>
                                <div class="col-md-12 text-center mt-4">
                                    <a href="/reset-password"><strong class="text-white">Quên mật khẩu ?</strong></a>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-center mb-3">
                                    <i>Bạn chưa có tài khoản</i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="/register" class="btn">Đăng Ký</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
