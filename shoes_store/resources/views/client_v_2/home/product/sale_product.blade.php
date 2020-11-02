@if (!$sellProducts->isEmpty())
  <section class="awe-section-6">	
    <section class="section_new_product">
      <div class="container">
        <div class="row row-noGutter-2">
          <div class="heading_spbc">
            <h2 class="title-head">
              <a href="san-pham-noi-bat.html">Best Seller
              </a>
            </h2>
          </div>
          <div class="border_wrap">
            <div class="owl_product_comback ">
              <div class="product_comeback_wrap">
                @foreach ($sellProducts as $sellProduct)
                  <div class="item saler_item col-lg-3 col-md-3 col-sm-4 col-xs-12 no-padding">
                    <div class="owl_item_product product-col">
                      <div class="product-box col-lg-12 col-md-12 col-sm-12 col-xs-12">															
                        <div class="product-thumbnail display_flex">
                          <div class="owl_product_item_content owl-carousel not-dot2" data-loop="true" data-dot="false" data-nav='false' data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'>
                            <div class="item">
                              <a class="image_link" href="chan-vay-dui-tron.html" title="{{ $sellProduct->name }}">
                                @php
                                  $imageProduct = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$sellProduct->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$sellProduct->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                @endphp
                                <img src="{{ $imageProduct }}"  alt="{{ $sellProduct->name }}">
                              </a>
                            </div>
                            
                            @if (!$sellProduct->shoesImages->isEmpty())
                              @foreach ($sellProduct->shoesImages as $shoesImage)
                                <div class="item">
                                  <a class="image_link" href="chan-vay-dui-tron.html" title="{{ $sellProduct->name }}">
                                    @php
                                      $shoesImage = \Storage::disk('public')->exists(\App\Models\ShoesImages::DIRECTORY.'/'.$shoesImage->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\ShoesImages::DIRECTORY.'/'.$shoesImage->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                    @endphp
                                    <img src="{{ $shoesImage }}"  alt="{{ $sellProduct->name }}">
                                  </a>
                                </div>
                              @endforeach
                            @endif
                          </div>
                          <div class="product-label"> 
                            <strong class="sold-out-label">Sale
                            </strong>
                          </div>
                          <div class="product-action-grid clearfix ">
                            <form action="https://homiessg.vn/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-16294033" enctype="multipart/form-data">
                              <div>
                                <input class="hidden" type="hidden" name="variantId" value="28923858" />
                                <div class="action_btn">
                                  <button class="btn-cart button_h left-to" title="Tùy chọn"  type="button" onclick="window.location.href='hd-croptop-ohoh-1.html'" >
                                    <i class="fa fa-plus" aria-hidden="true">
                                    </i> Tùy chọn
                                  </button>
                                </div>
                              </div>	
                            </form>
                          </div>
                        </div>
                        <div class="product-info a-left">
                          <h3 class="product-name">
                            <a href="hd-croptop-ohoh-1.html" title="Áo khoác Croptop OHOH (chữ đỏ)">Áo khoác Croptop OHOH (chữ đỏ)
                            </a>
                          </h3>
                          <div class="price-box clearfix">
                            @if ($sellProduct->is_sale == \App\Models\Shoes::IS_SALE)
                              <span class="price product-price">{{  $sellProduct->formartToVND($sellProduct->price_sale) ?? null }}</span>
                              <span class="price product-price-old">{{  $sellProduct->formartToVND($sellProduct->price) ?? null }}</span>
                            @else
                              <span class="price product-price black-price">{{  $sellProduct->formartToVND($sellProduct->price) ?? null }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="btn_xemthem">
            <a href="san-pham-noi-bat.html" title="Xem thêm">Xem thêm
            </a>  
          </div>
        </div>
      </div>
    </section>
  </section>
@endif
