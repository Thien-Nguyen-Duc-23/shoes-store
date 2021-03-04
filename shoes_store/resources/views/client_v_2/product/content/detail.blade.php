
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
  <div class="relative product-image-block ">
    <div class="large-image">
      @php
        $imageProductDetail = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$productDetailBySlug->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$productDetailBySlug->image) : asset('admin_lte/dist/img/default-50x50.gif');
      @endphp
      <a href="{{ $imageProductDetail }}" data-rel="prettyPhoto[product-gallery]">
        <img id="zoom_01" src="{{ $imageProductDetail }}" alt="{{ $productDetailBySlug->name ?? null }}">
      </a>
      <div class="hidden">
          @if (!$productDetailBySlug->shoesImages->isEmpty())
              @foreach ($productDetailBySlug->shoesImages as $productImgae)
                  @php
                    $productImgae = \Storage::disk('public')->exists(\App\Models\ShoesImages::DIRECTORY.'/'.$productImgae->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\ShoesImages::DIRECTORY.'/'.$productImgae->image) : asset('admin_lte/dist/img/default-50x50.gif');
                  @endphp
                  <div class="item">
                      <a href="{{ $productImgae }}" data-image="{{ $productImgae }}" data-zoom-image="{{ $productImgae }}" data-rel="prettyPhoto[product-gallery]">
                      </a>
                  </div>
              @endforeach
          @endif
      </div>
    </div>
    <div id="gallery_01"  class="swiper-container more-views" data-margin="10" data-items="4" data-direction="vertical" >
      <div class="swiper-wrapper">
          @if (!$productDetailBySlug->shoesImages->isEmpty())
              @foreach ($productDetailBySlug->shoesImages as $productImgae)
                  @php
                    $productImgae = \Storage::disk('public')->exists(\App\Models\ShoesImages::DIRECTORY.'/'.$productImgae->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\ShoesImages::DIRECTORY.'/'.$productImgae->image) : asset('admin_lte/dist/img/default-50x50.gif');
                  @endphp
                  <div class="swiper-slide">
                      <a href="{{ $productImgae }}" class="thumb-link" title="" data-rel="{{ $productImgae }}">
                      <img src="{{ $productImgae }}" alt="{{ $productDetailBySlug->name ?? null }}">
                      </a>
                  </div>
              @endforeach
          @endif
      </div>
      <div class="swiper-button-next hidden-lg">
        <i class="fa fa-angle-down"></i>
      </div>
      <div class="swiper-button-prev hidden-lg">
        <i class="fa fa-angle-up"></i>
      </div>
    </div>
    <div class="swiper-button-next fixlg hidden-xs hidden-sm hidden-md">
      <i class="fa fa-angle-down"></i>
    </div>
    <div class="swiper-button-prev fixlg hidden-xs hidden-sm hidden-md">
      <i class="fa fa-angle-up"></i>
    </div>
  </div>
</div>



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
    @if ($productDetailBySlug->checkIsSale())	
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
    <form class="form-inline margin-bottom-10">
      @if (!$productDetailBySlug->colors->isEmpty())
          <div class="swatch-color swatch clearfix" data-option-index="0">
              <div class="header">Màu:</div>
              @foreach ($productDetailBySlug->colors as $index => $color)
                  <div class="swatch-element color {{ $color->name == 'Trắng' ? 'trang' : $color->name }} available">
                      <div class="tooltip">{{ $color->name }}</div>
                      <input id="swatch-0-{{ $color->name == "Trắng" ? 'Trắng' : $color->name }}" data-color="{{ $color->name }}" type="radio" name="option-color" value="{{ $color->id }}" {{ $index == 0 ? 'checked' : '' }}/>
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
                    <input id="swatch-1-{{ $size->name }}" type="radio" name="option-size" data-size={{ $size->name }} value="{{ $size->id }}"  {{ $index == 0 ? 'checked' : '' }}/>
                    <label for="swatch-1-{{ $size->name }}">{{ $size->name }}</label>
                  </div>
              @endforeach
          </div>
      @endif

      <div class="form-group margin-top-10 form-detail-action clearfix">
        <label class="sluong ">Số lượng:</label>
        <div class="form-groupx custom custom-btn-number f-left">
          <span class="qtyminus" data-field="quantity">
            <i class="fa fa-caret-down"></i>
          </span>
          <input type="text" class="input-text qty" title="Só lượng" value="1" maxlength="12" id="qty" name="quantity" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == '')this.value=1;">
          <span class="qtyplus" data-field="quantity">
            <i class="fa fa-caret-up"></i>
          </span>
        </div>
        <button type="button" class="form-groupx btn btn-lg btn-primary btn-cart btn-cart2 btn_add_to_cart"
          data-product_cart_price = "{{ $productDetailBySlug->checkIsSale() ? $productDetailBySlug->price_sale : $productDetailBySlug->price }}"
          data-product_cart_name = "{{ $productDetailBySlug->name }}"
          data-product_cart_image = "{{ $imageProductDetail }}" 
          data-product_cart_id="{{ $productDetailBySlug->id }}"
          title="Cho vào giỏ hàng">
          <span>Thêm vào giỏ hàng</span>
        </button>
      </div>
      <div class="abps-productdetail ab-hide" ab-data-productid="19394074"></div>
    </form>
  </div>
</div>
