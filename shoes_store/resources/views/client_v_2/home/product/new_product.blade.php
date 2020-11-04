@if (!$newProducts->isEmpty())
  <section class="awe-section-5">	
    <section class="section_new_product">
      <div class="container">
        <div class="row row-noGutter-2">
          <div class="heading_spbc">
            <h2 class="title-head">
              <a href="san-pham-moi.html">Sản Phẩm Mới
              </a>
            </h2>
          </div>
          <div class="border_wrap">
            <div class="owl_product_comback ">
              <div class="product_comeback_wrap">
                @foreach ($newProducts as $newProduct)
                  <div class="item saler_item col-lg-3 col-md-3 col-sm-4 col-xs-12 no-padding">
                    <div class="owl_item_product product-col">
                      <div class="product-box col-lg-12 col-md-12 col-sm-12 col-xs-12">															
                        <div class="product-thumbnail display_flex">
                          <div class="owl_product_item_content owl-carousel not-dot2" data-loop="true" data-dot="false" data-nav='false' data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'>
                            <div class="item">
                              <a class="image_link" href="{{ route('product_detail', $newProduct->slug) }}" title="{{ $newProduct->name }}">
                                @php
                                  $imageProduct = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$newProduct->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$newProduct->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                @endphp
                                <img src="{{ $imageProduct }}"  alt="{{ $newProduct->name }}">
                              </a>
                            </div>
                            
                            @if (!$newProduct->shoesImages->isEmpty())
                              @foreach ($newProduct->shoesImages as $shoesImage)
                                <div class="item">
                                  <a class="image_link" href="{{ route('product_detail', $newProduct->slug) }}" title="{{ $newProduct->name }}">
                                    @php
                                      $shoesImage = \Storage::disk('public')->exists(\App\Models\ShoesImages::DIRECTORY.'/'.$shoesImage->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\ShoesImages::DIRECTORY.'/'.$shoesImage->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                    @endphp
                                    <img src="{{ $shoesImage }}"  alt="{{ $newProduct->name }}">
                                  </a>
                                </div>
                              @endforeach
                            @endif
                          </div>
                          @if ($newProduct->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($newProduct->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($newProduct->end_date_sale)->format('Y-m-d H:i:s')))
                            <div class="product-label"> 
                              <strong class="label">Sale</strong>
                            </div>
                          @endif
                          <div class="product-action-grid clearfix ">
                            <form class="variants form-nut-grid">
                              <div>
                                <div class="action_btn">
                                  <button class="btn-cart button_h left-to" title="Tùy chọn"  type="button" onclick="window.location.href='{{ route('product_detail', $newProduct->slug) }}'" >
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
                            <a href="{{ route('product_detail', $newProduct->slug) }}" title="{{ $newProduct->name }}">{{ $newProduct->name }}</a>
                          </h3>
                          <div class="price-box clearfix">
                            @if ($newProduct->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($newProduct->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($newProduct->end_date_sale)->format('Y-m-d H:i:s')))
                              <span class="price product-price">{{  $newProduct->formartToVND($newProduct->price_sale) ?? null }}</span>
                              <span class="price product-price-old">{{  $newProduct->formartToVND($newProduct->price) ?? null }}</span>
                            @else
                              <span class="price product-price black-price">{{  $newProduct->formartToVND($newProduct->price) ?? null }}</span>
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
            <a href="san-pham-moi.html" title="Xem thêm">Xem thêm</a>  
          </div>
        </div>
      </div>
    </section>
  </section>
@endif
