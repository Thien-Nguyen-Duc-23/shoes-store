@extends('client.layout.app')

@section('content-client')
    <div class="site-content-wrapper" style="margin-top: 0px;">
        <div class="row small-collapse">
            <div class="small-12 columns">
                <div class="site-content">
                    <article id="post-8" class="post-8 page type-page status-publish hentry">
                        <nav class="woocommerce-breadcrumb">
                            <a href="https://thehanger.wp-theme.design">Trang Chủ</a>
                            <span class="delimiter">/
                            </span>Đăng Nhập
                        </nav>
                        <div class="entry-content">
                            <div class="woocommerce">
                                
                                @include('client.common.error')
                                
                                <div class="u-columns col2-set" id="customer_login">
                                <div class="u-column1 col-2">
                                    <h2 class="entry-title">ĐĂNG NHẬP TÀI KHOẢN</h2>
                                    <form class="woocommerce-form woocommerce-form-login login" method="post" action="{{ route('post_login') }}">
                                        @csrf
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="username">Email address&nbsp;
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('email') ? 'text-danger' : '' }}" name="email" value="{{ old('email') }}" required >
                                            @if ($errors->has('email'))
                                                <span class="custom-span text-danger" role="alert">{{ $errors->first('email') }}</span>
                                            @endif	
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Mật khẩu&nbsp;
                                                <span class="required">*</span>
                                            </label>
                                            <span class="password-input">
                                                <input class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('password') ? 'text-danger' : '' }}" type="password" name="password" required>
                                                <span class="show-password-input"></span>
                                            </span>
                                            @if ($errors->has('password'))
                                                <span class="custom-span text-danger" role="alert">{{ $errors->first('password') }}</span>
                                            @endif
                                        </p>
                                        <p class="form-row">		
                                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit">Đăng Nhập</button>
                                        </p>
                                        <p class="woocommerce-LostPassword lost_password">
                                            <a style="font-size: 14px;" href="{{ route('index_register') }}">Bạn chưa có tài khoản?</a>
                                        </p>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- .entry-content -->
                    </article>
                <!-- #post-## -->
                </div>
            </div>
        </div>
        <div class="hover_overlay_content">
        </div>
    </div>  
@endsection
