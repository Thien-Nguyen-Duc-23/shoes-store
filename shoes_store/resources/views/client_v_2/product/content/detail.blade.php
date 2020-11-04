<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 details-pro">
    <h1 class="title-head">{{ $productDetailBySlug->name ?? null }}</h1>
    <div class="review">
      <span >
        <b>Hãng: 
        </b>
        Đang cập nhật
      </span>
    </div>
    <div class="detail-header-info">
      Tình trạng:
      <span class="inventory_quantity">Còn 5 sản phẩm
      </span>
      <span class="line">|
      </span>
      Mã SP:
      <span class="masp">{{ $productDetailBySlug->sku ?? null }}</span>
    </div>
    <div class="product_description">
      <div class="rte description rte-summary">
        <p>(*) Giao hàng Toàn Quốc
        </p>
        <p>(*) Thanh Toán khi nhận hàng
        </p>
        <p>(*) Cam kết hàng form chuẩn và giống hình 100%
        </p>
        <p>(*) Hoàn tiền nếu sản phẩm không giống hình
        </p>
      </div>
    </div>
    <div class="price-box">
        @if ($productDetailBySlug->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($productDetailBySlug->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($productDetailBySlug->end_date_sale)->format('Y-m-d H:i:s')))	
            <span class="special-price">
                <span class="price product-price margin-right-10 price-red">{{ $productDetailBySlug->formartToVND($productDetailBySlug->price_sale) ?? null }}</span>
            </span>
            <!-- Giá Khuyến mại -->
            <span class="old-price">
                <del class="price product-price-old">{{ $productDetailBySlug->formartToVND($productDetailBySlug->price) ?? null }}</del>
            </span>
            <!-- Giá gốc -->
        @else
            <span class="special-price">
                <span class="price product-price margin-right-10">{{ $productDetailBySlug->formartToVND($productDetailBySlug->price) ?? null }}</span>
            </span>
        @endif
    </div>
    <div class="form-product">
      <form enctype="multipart/form-data" id="add-to-cart-form" class="form-inline margin-bottom-10">
        @if (!$productDetailBySlug->colors->isEmpty())
            <div class="swatch-color swatch clearfix" data-option-index="0">
                <div class="header">Màu:</div>
                @foreach ($productDetailBySlug->colors as $index => $color)
                    <div class="swatch-element color {{ $color->name == 'Trắng' ? 'trang' : $color->name }} available">
                        <div class="tooltip">{{ $color->name }}</div>
                        <input id="swatch-0-{{ $color->name == "Trắng" ? 'Trắng' : $color->name }}" type="radio" name="option-0" value="{{ $color->id }}" {{ $index == 0 ? 'checked' : '' }}/>
                        <label for="swatch-0-{{ $color->name == "Trắng" ? 'Trắng' : $color->name }}" style="background-color: {{ $color->color_code }};"></label>
                    </div>
                @endforeach
            </div>
        @endif

        @if (!$productDetailBySlug->sizes->isEmpty())
            <div class=" swatch clearfix" data-option-index="1">
                <div class="header">Size:</div>
                @foreach ($productDetailBySlug->sizes as $index => $size)
                    <div class="swatch-element {{ $size->name }} available">
                        <input id="swatch-1-{{ $size->name }}" type="radio" name="size" value="{{ $size->id }}"  {{ $index == 0 ? 'checked' : '' }}/>
                        <label for="swatch-1-{{ $size->name }}">{{ $size->name }}</label>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="form-group margin-top-10 form-detail-action clearfix">
          <label class="sluong ">Số lượng: 
          </label>
          <div class="form-groupx custom custom-btn-number f-left">
            <span class="qtyminus" data-field="quantity">
              <i class="fa fa-caret-down">
              </i>
            </span>
            <input type="text" class="input-text qty" data-field='quantity' title="Só lượng" value="1" maxlength="12" id="qty" name="quantity" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == '')this.value=1;">
            <span class="qtyplus" data-field="quantity">
              <i class="fa fa-caret-up">
              </i>
            </span>
          </div>
          <button type="submit" class=" form-groupx btn btn-lg btn-primary btn-cart btn-cart2 add_to_cart btn_buy add_to_cart" title="Cho vào giỏ hàng">
            <span>Thêm vào giỏ hàng</span>
          </button>
        </div>
        <div class="abps-productdetail ab-hide" ab-data-productid="19394074"></div>
      </form>
    </div>
</div>
