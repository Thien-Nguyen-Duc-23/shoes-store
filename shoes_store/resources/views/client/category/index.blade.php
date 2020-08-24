@extends('client.layout.app')

@section('content-client')
<style>
  .price del {
    font-size: 10px;
  }

  .price del::before {
    transform: rotate(0deg);
    color: red !important;
  }
</style>
  <div class="site-content-wrapper">
    <div class="row small-collapse">
      <div class="large-12 columns">
        <div class="site-content woocommerce-sidebar-active">
          <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">		
              <nav class="woocommerce-breadcrumb">
                <a href="https://thehanger.wp-theme.design">Home
                </a>
                <span class="delimiter">/
                </span>
                <a href="https://thehanger.wp-theme.design/shop/">Shop
                </a>
                <span class="delimiter">/
                </span>
                <a href="https://thehanger.wp-theme.design/product-category/men/">Men
                </a>
                <span class="delimiter">/
                </span>Jackets &amp; Coats
              </nav>
              <div class="row">
                <!-- include sidabar -->
                @includeIf('client.category.sidebar')
                <!-- include sidabar -->
                <div class="small-12 large-9 columns">
                  <div class="site-main-content-wrapper">
                    <!-- include header -->
                    @includeIf('client.category.header')
                    <!-- include header -->
                    <div class="row">
                      <div class="large-12 columns">
                        <div class="site-main-content" id="sticky_bottom_anchor">
                          @php
                            $resultProducts = isset($resultProducts->shoes) ? $resultProducts->shoes : $resultProducts;
                          @endphp
                          @if (!$resultProducts->isEmpty())
                            <div class="woocommerce-notices-wrapper"></div>
                            <ul class="products columns-3 js_animated">
                              <li class="flex-break visible animation_ready animated"></li>
                              @foreach ($resultProducts as $resultProduct)
                                <li class="product type-product post-141 status-publish first instock product_cat-basics product_cat-jackets-coats product_cat-men has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
                                  <div class="main-container">
                                    <div class="product_image_wrapper">
                                      <div class="product_badges_wrapper">
                                        @if ($resultProduct->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($resultProduct->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($resultProduct->end_date_sale)->format('Y-m-d H:i:s')))  
                                          <span class="onsale">Sale!</span>
                                        @endif
                                      </div>
                                      <div class="product_image with_second_image second_image_loaded">
                                        <a href="https://thehanger.wp-theme.design/shop/men/basics/ripped-skinny-fit-jeans/">
                                          @php
                                            $resultProductImage = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$resultProduct->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$resultProduct->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                          @endphp
                                          <span class="product_second_image" style="width: 267.48px; height: 334.75px; background-image:url({{ $resultProductImage }})"></span>
                                          <img style="width: 267.48px; height: 334.75px;" src="{{ $resultProductImage }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">				
                                        </a>
                                      </div>
                                    </div>
                                    <div class="second-container">
                                      <div class="product_info">
                                        <a href="https://thehanger.wp-theme.design/shop/men/basics/ripped-skinny-fit-jeans/" class="title">
                                          <h2 class="woocommerce-loop-product__title">{{ $resultProduct->name }}
                                          </h2>
                                        </a>
                                        <span class="price">
                                          <span class="woocommerce-Price-amount amount">
                                            @if ($resultProduct->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($resultProduct->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($resultProduct->end_date_sale)->format('Y-m-d H:i:s')))
                                              <span class="woocommerce-Price-currencySymbol">$ </span> {{ $resultProduct->price_sale }}
                                                <del>
                                                  <span class="woocommerce-Price-amount amount" style="color: red">
                                                    <span class="woocommerce-Price-currencySymbol" style="color: red">$</span>
                                                    {{ $resultProduct->price }}
                                                  </span>
                                                </del>
                                            @else
                                              <span class="woocommerce-Price-currencySymbol">$ </span> {{ $resultProduct->price }}
                                            @endif
                                          </span>
                                        </span>
                                      </div>
                                      <div class="buttons" style="height: auto;">
                                        <a href="/product-category/men/jackets-coats/?add_to_wishlist=141" data-product-id="141" data-product-type="simple" data-wishlist-url="https://thehanger.wp-theme.design/wishlist/" data-browse-wishlist-text="Browse Wishlist" class="getbowtied_product_wishlist_button add_to_wishlist" rel="nofollow">
                                          <span class="tooltip">
                                            Add to Wishlist				
                                          </span>
                                        </a>			
                                        <a href="#" class="getbowtied_product_quick_view_button" data-product_id="141" rel="nofollow">
                                          <span class="tooltip">Quick View
                                          </span>
                                        </a>
                                        <a href="?add-to-cart=141" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="141" data-product_sku="" aria-label="Add “Ripped Skinny Fit Jeans” to your cart" rel="nofollow">
                                          <span class="tooltip">Add to cart
                                          </span>
                                        </a>			
                                      </div>
                                    </div>
                                  </div>
                                </li>
                              @endforeach
                            </ul>
                          @else
                            <p class="woocommerce-info">No products were found matching your selection.</p>
                          @endif
                        </div> 
                        <!-- end site-main-content -->
                      </div> 
                      <!-- end large-12 -->
                    </div>
                    <!-- end row -->
                  </div> 
                  <!-- end site-main-content-wrapper -->
                </div> 
              </div> 
              <!-- end row -->
            </main>
          </div>
        </div> 
        <!-- end site-content -->
      </div> 
      <!-- end large-12 -->
    </div> 
    <!-- end row -->
    <div class="hover_overlay_content">
    </div>
  </div>
  
@endsection
