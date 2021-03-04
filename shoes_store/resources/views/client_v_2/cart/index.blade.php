@extends('client_v_2.layout.app')

@push('styles')
    <style>
        .main-container .col-main .cart .bg-scroll .cart-tbody .item-cart div .remove-item-cart-index {
            text-transform: uppercase;
            color: #e95144;
            border-bottom: 1px solid #e95144;
            font-weight: 700;
            letter-spacing: 0.05em;
            font-size: 11px;
            display: inline-block;
            margin-top: 23px;
            float: right;
        }

        .cart_mobile_page .item_cart .name_item_cart .remove-item-cart-index {
            color: #232323;
            display: block;
            text-align: left;
            margin-top: 5px;
        }
    </style>
@endpush

@section('content-client')
    <!-- include bread_crumb -->
    @includeIf('client_v_2.cart.bread_crumb.index')
    <!-- end include bread_crumb -->

    <div class="container">
        <header class="page-header-cart">
            <h1>Giỏ hàng</h1>
            <a href="{{ route('home') }}" title="Continue Shopping" class="continue">Tiếp tục mua hàng</a>
        </header>
        <div class="main-cart-page main-container col1-layout">
            <div class="main main-cart-index"></div>
        </div>
    </div>
@endsection
