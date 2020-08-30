@extends('client.layout.app')

@section('content-client')
<div class="site-content-wrapper wrap-detail" style="margin-top: 0px;">
  <div class="site-content">
    <div class="details-product">
        @if (!empty($shoesDetail))
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="rows">
                    <div class="product-detail-left product-images col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <div class="row">
                            <div class="col_large_default large-image">
                                @php
                                    $shoesDetailImage = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$shoesDetail->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$shoesDetail->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                @endphp
                                <a href="{{ $shoesDetailImage }}" data-rel="prettyPhoto[product-gallery]">
                                    <img class="checkurl img-responsive" id="img_01" src="{{ $shoesDetailImage }}" alt="{{ $shoesDetail->name }}" />
                                </a>
                                @if(!empty($shoesImages))
                                    <div class="hidden">
                                        @foreach ($shoesImages as $shoesImage)
                                            @php
                                                $itemImages = \Storage::disk('public')->exists(\App\Models\ShoesImages::DIRECTORY.'/'.$shoesImage) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\ShoesImages::DIRECTORY.'/'.$shoesImage) : asset('admin_lte/dist/img/default-50x50.gif');
                                            @endphp
                                            <div class="item">
                                                <a
                                                    href="{{ $itemImages }}"
                                                    data-image="{{ $itemImages }}"
                                                    data-zoom-image="{{ $itemImages }}"
                                                    data-rel="prettyPhoto[product-gallery]"
                                                >
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div id="gallery_02" class="owl-carousel owl-theme thumbnail-product thumb_product_details not-dqowl" data-loop="false" data-lg-items="3" data-md-items="3" data-sm-items="3" data-xs-items="3" data-xxs-items="3" data-margin="10">
                                <div class="item">
                                    <a
                                        href="javascript:void(0)"
                                        data-image="{{ $shoesDetailImage }}"
                                        data-zoom-image="{{ $shoesDetailImage }}"
                                    >
                                        <img
                                            data-img="{{ $shoesDetailImage }}"
                                            src="{{ $shoesDetailImage }}"
                                            alt="{{ $shoesDetail->name }}"
                                        />
                                    </a>
                                </div>
                                @if(!empty($shoesImages))
                                    @foreach ($shoesImages as $shoesImage)
                                        @php
                                            $itemImages = \Storage::disk('public')->exists(\App\Models\ShoesImages::DIRECTORY.'/'.$shoesImage) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\ShoesImages::DIRECTORY.'/'.$shoesImage) : asset('admin_lte/dist/img/default-50x50.gif');
                                        @endphp
                                        <div class="item">
                                            <a
                                                href="javascript:void(0)"
                                                data-image="{{ $itemImages }}"
                                                data-zoom-image="{{ $itemImages }}"
                                            >
                                                <img
                                                    data-img="{{ $itemImages }}"
                                                    src="{{ $itemImages }}"
                                                    alt="{{ $shoesDetail->name }}"
                                                />
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 details-pro">
                        <h1 class="title-product">{{ $shoesDetail->name ?? null }}</h1>
                        <div class="group-status" style="color: #000;">
                            <span class="hidden first_status status_th">Thương hiệu: <span class="status_name">Đang cập nhật</span></span>
                            <span class="first_status">SKU: <span class="status_name">{{ $shoesDetail->sku ?? null }} </span></span>
                            <span class="first_status">
                                &nbsp;|&nbsp; Tình trạng:
                                <span class="status_name availabel">
                                    Còn hàng
                                </span>
                            </span>
                        </div>
                        <div class="reviews_details_product">
                            <div class="sapo-product-reviews-badge sapo-product-reviews-badge-detail" data-id="16208530"></div>
                        </div>

                        <div class="price-box">
                            @if ($shoesDetail->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($shoesDetail->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($shoesDetail->end_date_sale)->format('Y-m-d H:i:s')))
                                <span class="special-price" style="font-family: 'Roboto','HelveticaNeue','Helvetica Neue',sans-serif;">
                                    <span class="price product-price">{{ $shoesDetail->formartToVND($shoesDetail->price_sale) ?? null }}</span>
                                </span>
                                <!-- Giá Khuyến mại -->
                                <span class="old-price" style="font-family: 'Roboto','HelveticaNeue','Helvetica Neue',sans-serif;">
                                    <del class="price product-price-old">
                                        {{ $shoesDetail->formartToVND($shoesDetail->price) ?? null }}
                                    </del>
                                </span>
                                <!-- Giá gốc -->
                            @else
                                <span class="special-price" style="font-family: 'Roboto','HelveticaNeue','Helvetica Neue',sans-serif;">
                                    <span class="price product-price">{{ $shoesDetail->formartToVND($shoesDetail->price) ?? null }}</span>
                                </span>
                            @endif
                        </div>

                        <div class="product-summary product_description margin-bottom-0">
                            <div class="rte description rte-summary">
                                <p>
                                    {{ $shoesDetail->sort_description ?? null }}
                                </p>
                            </div>
                        </div>

                        <div class="thongtinkhuyenmai">
                            <div class="content rte rte-summary">
                                <ul>
                                    <li>
                                        <span style="font-family: Tahoma, Geneva, sans-serif;"><span style="font-size: 12px;">Tặng thêm Tote bag + Freeship với đơn hàng từ 3.000.000đ</span></span>
                                    </li>
                                    <li>
                                        <span style="font-family: Tahoma, Geneva, sans-serif;"><span style="font-size: 12px;">Freeship cho đơn hàng từ 2.000.000đ</span></span>
                                    </li>
                                    <li>
                                        <span style="font-family: Tahoma, Geneva, sans-serif;"><span style="font-size: 12px;">Bảo hành chính hãng 1 tháng với giày dép</span></span>
                                    </li>
                                    <li>
                                        <span style="font-family: Tahoma, Geneva, sans-serif;">
                                            <span style="font-size: 12px;">
                                                Freeship cho đơn hàng từ 600k với Hà Nội, Hải Phòng, Quảng Ninh,&nbsp;Hải Dương, Đà Nẵng, TP Hồ Chí Minh<br />
                                                <span style="color: #ff0000;">(Không áp dụng đồng thời các chương trình&nbsp;khuyến mãi khác)</span>
                                            </span>
                                        </span>
                                    </li>
                                </ul>
                                <div class="nhapnhap">
                                    <i class="fa fa-arrow-up"></i><i class="fa fa-arrow-up"></i><strong><a href="https://www.wear.com.vn/huong-dan-chon-size">Nhấp vào đây xem hướng dẫn đo size</a></strong><i class="fa fa-arrow-up"></i>
                                    <i class="fa fa-arrow-up"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-product col-sm-12">
                            <form enctype="multipart/form-data" id="add-to-cart-form" action="/cart/add" method="post" class="form-inline margin-bottom-0">
                                <div class="box-variant clearfix">
                                    <fieldset class="form-group">
                                        <div class="selector-wrapper" style="text-align: left; margin-bottom: 10px;">
                                        <label>Size</label>
                                        <select class="single-option-selector" data-option="option1" id="product-selectors-option-0">
                                            @if (empty($shoesSizes)) 
                                                <option value="">No item</option>
                                            @else
                                                @foreach ($shoesSizes as $key => $itemShize)
                                                    <option value="{{ $key }}">{{ $itemShize ?? null }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="box-variant clearfix">
                                    <fieldset class="form-group">
                                        <div class="selector-wrapper" style="text-align: left; margin-bottom: 10px;">
                                        <label>Color</label>
                                        <select class="single-option-selector" data-option="option1" id="product-selectors-option-0">
                                            @if (empty($shoesColors)) 
                                                <option value="">No item</option>
                                            @else
                                                @foreach ($shoesColors as $key => $itemColor)
                                                    <option value="{{ $key }}">{{ $itemColor ?? null }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        </div>
                                    </fieldset>
                                </div>                     
                                <div class="form-group form_button_details margin-top-5">
                                    <div class="form_product_content">
                                        <div class="soluong show">
                                            <div class="label_sl margin-bottom-10">Số lượng:</div>
                                            <div class="custom input_number_product custom-btn-number form-control">
                                                <button
                                                    class="btn_num num_1 button button_qty"
                                                    onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;"
                                                    type="button"
                                                >
                                                    -
                                                </button>
                                                <input type="text" id="qtym" name="quantity" value="1" onkeyup="valid(this,'numbers')" onkeypress="validate(event)" class="form-control prd_quantity" />
                                                <button
                                                    class="btn_num num_2 button button_qty"
                                                    onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;"
                                                    type="button"
                                                >
                                                    +
                                                </button>
                                            </div>
                                        </div>

                                        <div class="button_actions clearfix">
                                            <button type="submit" class="btn btn_base btn_add_cart btn-cart add_to_cart">
                                                <span class="text_1">MUA NGAY</span>
                                                <span class="text_2">Giao hàng COD tận nơi</span>
                                            </button>

                                            <a class="btn btn_base btn_call" href="tel:02477702777">
                                                <span class="text_1">GỌI ĐẶT HÀNG</span>

                                                <span class="text_2">Vui lòng gọi ngay 02477702777</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="md-discount-box-inform" id="md-discount-box-inform"></div>
                        </div>
                    </div>
                </div>
                <div class="tab_h">
                    <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12 no-padding">
                        <!-- Nav tabs -->
                        <div class="product-tab e-tabs">
                            <ul class="tabs tabs-title clearfix">
                                <li class="tab-link" data-tab="tab-1">
                                    <h3><span>Mô tả sản phẩm</span></h3>
                                </li>

                                <li class="tab-link" data-tab="tab-2">
                                    <h3><span>Hướng dẫn chọn size</span></h3>
                                </li>

                                <li class="tab-link" data-tab="tab-3">
                                    <h3><span>Đánh giá</span></h3>
                                </li>
                            </ul>

                            <div id="tab-1" class="tab-content">
                                <div class="rte">
                                    <div class="product-well">
                                        <div class="ba-text-fpt">
                                            {!! $shoesDetail->long_description ?? null !!}
                                        </div>

                                        <div class="show-more">
                                            <a class="btn btn-default btn--view-more">
                                                <span class="more-text">Xem đầy đủ</span>
                                                <span class="less-text">Thu gọn</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="tab-2" class="tab-content">
                                <div class="rte">
                                    <p><img data-thumb="original" original-height="1121" original-width="750" src="https://bizweb.dktcdn.net/100/347/923/files/chon-size.png?v=1552355241936" /></p>
                                </div>
                            </div>

                            <div id="tab-3" class="tab-content">
                                <div class="rte">
                                    <div id="sapo-product-reviews" class="sapo-product-reviews" data-id="16208530">
                                        <div id="sapo-product-reviews-noitem" style="display: none;">
                                            <div class="content">
                                                <p data-content-text="language.suggest_noitem"></p>
                                                <div class="product-reviews-summary-actions">
                                                    <button type="button" class="btn-new-review" onclick="BPR.newReview(this); return false;" data-content-str="language.newreview"></button>
                                                </div>
                                                <div id="noitem-bpr-form_" data-id="formId" class="noitem-bpr-form" style="display: none;"><div class="sapo-product-reviews-form"></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- include sidebar-->
            @includeIf('client.shoes.sidebar')
            <!-- end include sidebar-->

            <!-- include related product -->
            @includeIf('client.shoes.relation', ['relationShoes' => $relationShoes])
            <!-- end include related product -->
        @endif
    </div> <!-- /.related-product -->
  </div>
</div>


<div id="popup-cart" class="fade" role="dialog" style="display: none;">
    <div class="p-overlay"></div>
	<div id="popup-cart-desktop" class="clearfix">
		<div class="title-popup-cart">
			<img src="https://bizweb.dktcdn.net/100/347/923/themes/742041/assets/icon-check.png?1598019367421"  alt="Wear Vietnam"/> <span class="your_product">Bạn đã thêm <span class="cart_name_style">[ <span class="cart-popup-name">Giày Vans Slip-On Jawbones - Size 4.5US - Size 36.0VN - 22.5CM</span>]</span> vào giỏ hàng thành công ! </span>
		</div>
		<div class="wrap_popup">
			<div class="title-quantity-popup" >
				<span class="cart_status" onclick="window.location.href='/cart';">Giỏ hàng của bạn có <span class="cart-popup-count">2</span> sản phẩm </span> <i class="fa fa-caret-right" aria-hidden="true"></i>
			</div>
			<div class="content-popup-cart">
				<div class="thead-popup">
					<div style="width: 53%;" class="text-left">Sản phẩm</div>
					<div style="width: 15%;" class="text-center">Đơn giá</div>
					<div style="width: 15%;" class="text-center">Số lượng</div>
					<div style="width: 17%;" class="text-center">Thành tiền</div>
				</div>
				<div class="tbody-popup scrollbar-dynamic">
				    <div class="item-popup productid-28668309">
				        <div style="width: 13%;" class="border height image_ text-left">
				            <div class="item-image">
				                <a class="product-image" href="/vans-slip-on-jawbones-vn0a4bv3tbq" title="Giày Vans Slip-On Jawbones - Size 4.5US - Size 36.0VN - 22.5CM">
				                    <img alt="Giày Vans Slip-On Jawbones - Size 4.5US - Size 36.0VN - 22.5CM" src="https://bizweb.dktcdn.net/100/347/923/products/vn0a4bv3tbq-5.jpg?v=1584680507310" width="90" />
				                </a>
				            </div>
				        </div>
				        <div style="width: 39.8%;" class="height text-left">
				            <div class="item-info">
				                <p class="item-name"><a class="text2line textlinefix" href="/vans-slip-on-jawbones-vn0a4bv3tbq" title="Giày Vans Slip-On Jawbones - Size 4.5US - Size 36.0VN - 22.5CM">Giày Vans Slip-On Jawbones</a></p>
				                <span class="variant-title-popup">Size 4.5US - Size 36.0VN - 22.5CM</span><a href="javascript:;" class="remove-item-cart" title="Xóa" data-id="28668309"><i class="fa fa-close"></i>&nbsp;&nbsp;Xoá</a>
				            </div>
				        </div>
				        <div style="width: 14.9%;" class="border height text-center">
				            <div class="item-price"><span class="price">950.000₫</span></div>
				        </div>
				        <div style="width: 15.1%;" class="border height text-center">
				            <div class="qty_h check_">
				                <input class="variantID" type="hidden" name="variantId" value="28668309" />
				                <button
				                    onclick="var result = document.getElementById('qtyItemP28668309'); var qtyItemP28668309 = result.value; if( !isNaN( qtyItemP28668309 ) &amp;&amp; qtyItemP28668309 > 1 ) result.value--;return false;"
				                    class="num1 reduced items-count btn-minus"
				                    type="button"
				                >
				                    -
				                </button>
				                <input type="text" maxlength="12" min="0" readonly="" class="input-text number-sidebar qtyItemP28668309" id="qtyItemP28668309" name="Lines" size="4" value="9" />
				                <button
				                    onclick="var result = document.getElementById('qtyItemP28668309'); var qtyItemP28668309 = result.value; if( !isNaN( qtyItemP28668309 )) result.value++;return false;"
				                    class="num2 increase items-count btn-plus"
				                    type="button"
				                >
				                    +
				                </button>
				            </div>
				        </div>
				        <div style="width: 17.2%;" class="border height text-center">
				            <span class="cart-price"> <span class="price">8.550.000₫</span> </span>
				        </div>
				    </div>
				    <div class="item-popup productid-28754118">
				        <div style="width: 13%;" class="border height image_ text-left">
				            <div class="item-image">
				                <a class="product-image" href="/converse-chuck-taylor-all-star-madison-566275c" title="Giày Converse Chuck Taylor All Star VLTG Chevron - Size 6.0US - Size 36.5VN - 23.0CM">
				                    <img alt="Giày Converse Chuck Taylor All Star VLTG Chevron - Size 6.0US - Size 36.5VN - 23.0CM" src="https://bizweb.dktcdn.net/100/347/923/products/566275c-1.jpg?v=1584452069863" width="90" />
				                </a>
				            </div>
				        </div>
				        <div style="width: 39.8%;" class="height text-left">
				            <div class="item-info">
				                <p class="item-name">
				                    <a class="text2line textlinefix" href="/converse-chuck-taylor-all-star-madison-566275c" title="Giày Converse Chuck Taylor All Star VLTG Chevron - Size 6.0US - Size 36.5VN - 23.0CM">
				                        Giày Converse Chuck Taylor All Star VLTG Chevron
				                    </a>
				                </p>
				                <span class="variant-title-popup">Size 6.0US - Size 36.5VN - 23.0CM</span><a href="javascript:;" class="remove-item-cart" title="Xóa" data-id="28754118"><i class="fa fa-close"></i>&nbsp;&nbsp;Xoá</a>
				                <p class="addpass" style="color: #fff; margin: 0px;">28754118</p>
				            </div>
				        </div>
				        <div style="width: 14.9%;" class="border height text-center">
				            <div class="item-price"><span class="price">1.350.000₫</span></div>
				        </div>
				        <div style="width: 15.1%;" class="border height text-center">
				            <div class="qty_h check_">
				                <input class="variantID" type="hidden" name="variantId" value="28754118" />
				                <button
				                    onclick="var result = document.getElementById('qtyItemP28754118'); var qtyItemP28754118 = result.value; if( !isNaN( qtyItemP28754118 ) &amp;&amp; qtyItemP28754118 > 1 ) result.value--;return false;"
				                    disabled=""
				                    class="num1 reduced items-count btn-minus"
				                    type="button"
				                >
				                    -
				                </button>
				                <input type="text" maxlength="12" min="0" readonly="" class="input-text number-sidebar qtyItemP28754118" id="qtyItemP28754118" name="Lines" size="4" value="1" />
				                <button
				                    onclick="var result = document.getElementById('qtyItemP28754118'); var qtyItemP28754118 = result.value; if( !isNaN( qtyItemP28754118 )) result.value++;return false;"
				                    class="num2 increase items-count btn-plus"
				                    type="button"
				                >
				                    +
				                </button>
				            </div>
				        </div>
				        <div style="width: 17.2%;" class="border height text-center">
				            <span class="cart-price"> <span class="price">1.350.000₫</span> </span>
				        </div>
				    </div>
				</div>
				<div class="tfoot-popup">
					<div class="tfoot-popup-1 a-right clearfix">
						<span class="total-p popup-total">Tổng tiền thanh toán: <span class="total-price">13.700.000₫</span></span>
					</div>
					<div class="tfoot-popup-2 clearfix">
						<a class="button buy_ btn-proceed-checkout" title="Thực hiện thanh toán" href="/checkout"><span>Thực hiện thanh toán</span></a>
						<a class="button checkout_ btn-proceed-checkout" title="Tiếp tục mua hàng" ><span><span>Tiếp tục mua hàng</span></span></a>
					</div>
				</div>
			</div>
			<a title="Close" class="close-window" href="javascript:;"><i class="fa  fa-close"></i></a>
		</div>
	</div>
</div>

@endsection
