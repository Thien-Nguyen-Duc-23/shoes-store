@if (!$relationProducts->isEmpty())
  <div class="col-xs-12">
    <div class="related-product margin-top-20 margin-bottom-30">
      <div class="section_prd_feature">
        <div class="heading_related_h">
          <h2 class="title-head">
            <a href="#">Sản phẩm liên quan
            </a>
          </h2>
        </div>
        <div class="products owl_timeout product_related products-view-grid-bb owl-carousel owl-theme products-view-grid not-nav2 not-dot2" data-dot= "false" data-nav= "false" data-lg-items="4" data-md-items="4" data-sm-items="3" data-xs-items="1" data-margin="20">
          @foreach ($relationProducts as $relationProduct)
            @php
              $imageRelation = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$relationProduct->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$relationProduct->image) : asset('admin_lte/dist/img/default-50x50.gif');
            @endphp
            <div class="item saler_item">
              <div class="owl_item_product product-col">
                <div class="product-box">															
                  <div class="product-thumbnail display_flex">
                    <div class="product_image_list owl_product_item_content owl-carousel not-dot2" data-loop="true" data-dot="false" data-nav='false' data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'>
                      @if (!$relationProduct->shoesImages->isEmpty())
                        @foreach ($relationProduct->shoesImages as $imageRelationProduct)
                          @php
                            $imageRelationProduct = \Storage::disk('public')->exists(\App\Models\ShoesImages::DIRECTORY.'/'.$imageRelationProduct->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\ShoesImages::DIRECTORY.'/'.$imageRelationProduct->image) : asset('admin_lte/dist/img/default-50x50.gif');
                          @endphp
                          <div class="item">
                            <a class="image_link" href="{{ route('product_detail', $relationProduct->slug) }}" title="{{ $relationProduct->name }}">
                              <img src="{{ $imageRelation }}"  data-lazyload="{{ $imageRelationProduct }}" alt="{{ $relationProduct->name }}">
                            </a>
                          </div>
                        @endforeach
                      @endif
                    </div>
                    @if ($relationProduct->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($relationProduct->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($relationProduct->end_date_sale)->format('Y-m-d H:i:s')))	
                      <div class="product-label">
                        <strong class="label">Sale</strong>
                      </div>
                    @endif
                    <div class="product-action-grid clearfix ">
                      <form class="variants form-nut-grid">
                        <div>
                          <div class="action_btn">
                            <button class="btn-cart button_h left-to" title="Chọn sản phẩm"  type="button" onclick="window.location.href='{{ route('product_detail', $relationProduct->slug) }}'" >
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
                      <a href="{{ route('product_detail', $relationProduct->slug) }}" title="{{ $relationProduct->name }}">{{ $relationProduct->name }}</a>
                    </h3>
                    <div class="price-box clearfix">
                      @if ($relationProduct->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($relationProduct->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($relationProduct->end_date_sale)->format('Y-m-d H:i:s')))	
                        <span class="price product-price">{{ $relationProduct->formartToVND($relationProduct->price_sale) ?? null }}</span>
                        <span class="price product-price-old">{{ $relationProduct->formartToVND($relationProduct->price) ?? null }}</span>
                      @else
                        <span class="price product-price black-price">{{ $relationProduct->formartToVND($relationProduct->price) ?? null }}</span>
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
  </div>
@endif
