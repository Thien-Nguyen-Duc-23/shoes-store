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
                            </span>Đăng Ký
                        </nav>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="woocommerce">
                                
                                @include('client.common.error')

                                <div class="u-columns col2-set" id="customer_login">
                                <div class="u-column1 col-2">
                                    <h2 class="entry-title">ĐĂNG KÝ TÀI KHOẢN</h2>
                                    <form class="" method="POST" action="{{ route('store_register') }}">
                                        @csrf
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="username">Họ và tên&nbsp;
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('name') ? 'text-danger' : '' }}" name="name" value="{{ old('name') }}" required>
                                            @if ($errors->has('name'))
                                                <span class="custom-span text-danger" role="alert">{{ $errors->first('name') }}</span>
                                            @endif
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="username">Email address&nbsp;
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('email') ? 'text-danger' : '' }}" name="email" value="{{ old('email') }}" required>
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
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="password">Xác nhận mật khẩu&nbsp;
                                                <span class="required">*</span>
                                            </label>
                                            <span class="password-input">
                                                <input class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('password_confirmation') ? 'text-danger' : '' }}" type="password" name="password_confirmation" required>
                                                <span class="show-password-input"></span>
                                            </span>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="custom-span text-danger" role="alert">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="username">Số điện thoại&nbsp;
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('phone') ? 'text-danger' : '' }}" name="phone" value="{{ old('phone') }}" required>
                                            @if ($errors->has('phone'))
                                                <span class="custom-span text-danger" role="alert">{{ $errors->first('phone') }}</span>
                                            @endif	
                                        </p>
                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="username">Địa chỉ&nbsp;
                                                <span class="required">*</span>
                                            </label>
                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('address') ? 'text-danger' : '' }}" name="address" value="{{ old('address') }}" required>
                                            @if ($errors->has('address'))
                                                <span class="custom-span text-danger" role="alert">{{ $errors->first('address') }}</span>
                                            @endif		
                                        </p>
                                        <p class="form-row">			
                                            <button type="submit" class="">Đăng Ký</button>
                                        </p>
                                        <p class="woocommerce-LostPassword lost_password">
                                            <a style="font-size: 14px;" href="{{ route('index_login') }}">Bạn đã có tài khoản?</a>
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
