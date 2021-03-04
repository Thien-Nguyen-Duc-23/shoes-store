<div id="popup-cart" class="modal fade" role="dialog">
    <div id="popup-cart-desktop" class="clearfix">
        <div class="title-popup-cart">
            <i class="fa fa-check check" aria-hidden="true"></i>
            <span class="pop-title">Sản phẩm 
                <span class="cart-popup-name"></span> đã thêm vào giỏ hàng
            </span>
        </div>
        <div class="content-popup-cart">
            <div class="tbody-popup"></div>
            <div class="tfoot-popup">
                <div class="tfoot-popup-1 clearfix">
                    <div class="pull-left popup-ship"></div>
                    <div class="pull-right popup-total">
                        <p>Tổng tiền: 
                            <span class="total-price"></span>
                        </p>
                    </div>
                </div>
                <div class="tfoot-popup-2 clearfix">
                    <a class="button btn-proceed-checkout" title="Tiến hành đặt hàng" href="cart.html">
                        <span>Tiến hành đặt hàng</span>
                    </a>
                    <a href="{{ route('cart_index') }}" class="button btn-continue" title="Tiếp tục mua hàng">
                        <span>
                            <span>
                                <i class="fa fa-caret-left" aria-hidden="true"></i> Giỏ hàng của bạn
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <a title="Close" class="quickview-close close-window" href="javascript:;" onclick="$('#popup-cart').modal('hide');"></a>
    </div>
</div>
