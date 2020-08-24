@extends('client.layout.app')

@section('content-client')
  <style>
    .heading_hotdeal {
      display: block;
      position: relative;
    }
    .heading_hotdeal h2 {
      text-align: center;
      font-family: 'UTM';
      font-size: 36px;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .title-head {
      font-size: 18px;
      text-transform: uppercase;
      margin-top: 9px;
      color: #080000;
      text-decoration: none;
    }
    .heading_hotdeal h2 a {
      text-transform: uppercase;
    }
    .color_main {
      color: #000;
    }
    @media (max-width: 1199px) and (min-width: 992px) {
      .heading_hotdeal:before {
        left: 32.3%;
      }
    }
    .heading_hotdeal:before {
      content: "";
      background: url(//bizweb.dktcdn.net/100/347/923/themes/742041/assets/bg_title_hotdeal.png?1596274353336);
      position: absolute;
      width: 52px;
      height: 30px;
      top: 10px;
      left: 32.3%;
    }
    @media (max-width: 1199px) and (min-width: 992px) {
      .heading_hotdeal:after {
        right: 32.3%;
      }
    }
    .heading_hotdeal:after {
      content: "";
      background: url(//bizweb.dktcdn.net/100/347/923/themes/742041/assets/bg_title_hotdeal.png?1596274353336);
      position: absolute;
      width: 52px;
      height: 30px;
      top: 10px;
      right: 32.3%;
      transform: rotate(180deg);
    }

    .price del {
      font-size: 10px;
    }

    .price del::before {
      transform: rotate(0deg);
      color: red !important;
    }
    @media screen and (min-width: 80em) {
      ul.products:not(.shop_display_list) .product .main-container .second-container .product_info a.title .woocommerce-loop-product__title {
          font-size: 13px;
          margin-bottom: 7px;
      }
    }
  </style>
  <div class="site-content-wrapper">
    <div class="row small-collapse">
      <div class="small-12 columns">
        <div class="site-content">
          <article id="post-572" class="post-572 page type-page status-publish hentry">
            <div class="entry-content">
              <!-- include banner -->
              @includeIf('client.home.banner')
              <!-- include banner -->
              <div class="vc_row-full-width vc_clearfix"></div>
              <div class="vc_row wpb_row vc_row-fluid vc_custom_1519815605942">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                  <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                      <div class="heading_hotdeal">
                        <h2 class="title-head">
                          <a href="60"><span class="color_main">SALE</span> SALE</a>
                        </h2>
                      </div>
                      <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner">
                          <div class="wpb_wrapper">
                            <div class="woocommerce columns-6 ">
                              <ul class="products columns-6 js_animated">
                                @foreach ($shoesSales as $shoesSale)
                                  <li class="product type-product post-656 status-publish first instock product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
                                    <div class="main-container">
                                      <div class="product_image_wrapper">
                                        <div class="product_badges_wrapper">
                                          <span class="onsale">Sale!</span>
                                        </div>
                                        <div class="product_image with_second_image second_image_loaded">
                                          <a href="#">
                                            @php
                                              $itemImage = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$shoesSale->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$shoesSale->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                            @endphp
                                            <span class="product_second_image" style="background-image:url({{ $itemImage }})"></span>
                                            <img style="width: 160px; height: 180px;" src="{{ $itemImage }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">				
                                          </a>
                                        </div>
                                      </div>
                                      <div class="second-container">
                                        <div class="product_info">
                                          <a href="#" class="title">
                                            <h2 class="woocommerce-loop-product__title">{{ $shoesSale->name }}</h2>
                                          </a>
                                          <a href="#" class="title" style="font-weight: bold;">
                                            <h2 class="woocommerce-loop-product__title">SKU:  {{ $shoesSale->sku }}</h2>
                                          </a>
                                          <span class="price" style="font-weight: bold;">
                                            <span class="woocommerce-Price-amount amount">
                                              <span class="woocommerce-Price-currencySymbol">$ </span> {{ $shoesSale->price_sale }}
                                              <del>
                                                <span class="woocommerce-Price-amount amount" style="color: red">
                                                  <span class="woocommerce-Price-currencySymbol" style="color: red">$</span>
                                                  {{ $shoesSale->price }}
                                                </span>
                                              </del>
                                            </span>
                                          </span>
                                        </div>
                                        <div class="buttons" style="height: auto;">
                                          <a href="#" data-product-id="656" data-product-type="simple" data-wishlist-url="https://thehanger.wp-theme.design/wishlist/" data-browse-wishlist-text="Browse Wishlist" class="getbowtied_product_wishlist_button add_to_wishlist" rel="nofollow">
                                            <span class="tooltip">
                                              Add to Wishlist				
                                            </span>
                                          </a>			
                                          <a href="#" class="getbowtied_product_quick_view_button" data-product_id="656" rel="nofollow">
                                            <span class="tooltip">Quick View
                                            </span>
                                          </a>
                                          <a href="?add-to-cart=656" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="656" data-product_sku="" aria-label="Add “Stretch camouflage sneakers” to your cart" rel="nofollow">
                                            <span class="tooltip">Add to cart
                                            </span>
                                          </a>			
                                        </div>
                                      </div>
                                    </div>
                                  </li>
                                @endforeach
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="vc_btn3-container vc_btn3-center">
                          <a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-black" href="shop/index92f8.html?on-sale=1" title="">Show More
                          </a>
                        </div>
                      </div>                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="vc_row-full-width vc_clearfix"></div>
              @foreach ($shoesOfCategories as $key => $shoesOfCategory)
                @php
                  $shoesOfCategoryImage = \Storage::disk('public')->exists(\App\Models\Categories::DIRECTORY.'/'.$shoesOfCategory->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Categories::DIRECTORY.'/'.$shoesOfCategory->image) : asset('admin_lte/dist/img/default-50x50.gif');
                @endphp
                @if ($key % 2 == 0)
                  <div style="margin-top: 20px;">
                    <div class="wpb_animate_when_almost_visible wpb_fadeIn fadeIn wpb_column vc_column_container vc_col-sm-6 wpb_start_animation animated">
                      <div class="vc_column-inner vc_custom_1520428716723">
                        <div class="wpb_wrapper">
                          <div class="woocommerce columns-1">
                            <ul class="products columns-1 js_animated">
                              <li class="product-category product first visible animation_ready animated">
                                <a href="{{ route('product_category', $shoesOfCategory->slug) }}">
                                  <span class="getbowtied-subcategory-image" style="background-image :url({{ $shoesOfCategoryImage }});">
                                  </span>			
                                  <h2 class="woocommerce-loop-category__title">
                                    {{ $shoesOfCategory->name }} 
                                    <mark class="count"> {{ count($shoesOfCategory->shoes) }}
                                    </mark>			
                                  </h2>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-6">
                      <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                          <div class="woocommerce columns-3 ">
                            <ul class="products columns-3 js_animated">
                              @if (!$shoesOfCategory->shoes->isEmpty())
                                @foreach ($shoesOfCategory->shoes as $itemShoes)
                                  <li class="product type-product post-612 status-publish first instock product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
                                    <div class="main-container">
                                      <div class="product_image_wrapper">
                                        <div class="product_badges_wrapper">
                                          @if ($itemShoes->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($itemShoes->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($itemShoes->end_date_sale)->format('Y-m-d H:i:s')))
                                            <span class="onsale">Sale!</span>
                                          @endif
                                        </div>
                                        <div class="product_image with_second_image second_image_loaded">
                                          <a href="#">
                                              @php
                                                $itemShoesImage = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$itemShoes->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$itemShoes->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                              @endphp
                                            <span class="product_second_image" style="background-image:url({{ $itemShoesImage }})">
                                            </span>
                                            <img style="width: 160px; height: 180px;" src="{{ $itemShoesImage }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">				
                                          </a>
                                        </div>
                                      </div>
                                      <div class="second-container">
                                        <div class="product_info">
                                          <a href="#" class="title">
                                            <h2 class="woocommerce-loop-product__title">{{ $itemShoes->name }}
                                            </h2>
                                          </a>
                                          <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                              <span class="woocommerce-Price-currencySymbol">$ </span> {{ $shoesSale->price_sale }}
                                              @if ($itemShoes->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($itemShoes->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($itemShoes->end_date_sale)->format('Y-m-d H:i:s')))
                                                <span class="woocommerce-Price-currencySymbol">$ </span> {{ $shoesSale->price_sale }}
                                                <del>
                                                  <span class="woocommerce-Price-amount amount" style="color: red">
                                                    <span class="woocommerce-Price-currencySymbol" style="color: red">$</span>
                                                    {{ $shoesSale->price }}
                                                  </span>
                                                </del>
                                              @else
                                                <span class="woocommerce-Price-currencySymbol">$ </span> {{ $shoesSale->price }}
                                              @endif
                                            </span>
                                          </span>
                                        </div>
                                        <div class="buttons" style="height: auto;">
                                          <a href="/pages/home-sneaker-collections/?add_to_wishlist=612" data-product-id="612" data-product-type="simple" data-wishlist-url="https://thehanger.wp-theme.design/wishlist/" data-browse-wishlist-text="Browse Wishlist" class="getbowtied_product_wishlist_button add_to_wishlist" rel="nofollow">
                                            <span class="tooltip">
                                              Add to Wishlist				
                                            </span>
                                          </a>			
                                          <a href="#" class="getbowtied_product_quick_view_button" data-product_id="612" rel="nofollow">
                                            <span class="tooltip">Quick View
                                            </span>
                                          </a>
                                          <a href="?add-to-cart=612" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="612" data-product_sku="" aria-label="Add “Black mesh sock sneakers” to your cart" rel="nofollow">
                                            <span class="tooltip">Add to cart
                                            </span>
                                          </a>			
                                        </div>
                                      </div>
                                    </div>
                                  </li>
                                @endforeach
                              @endif
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="vc_btn3-container vc_btn3-center">
                      <a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-black" href="shop/index92f8.html?on-sale=1" title="">Show More
                      </a>
                    </div>
                  </div>
                  <div class="vc_row-full-width vc_clearfix"></div>
                @else
                  <div style="margin-top: 20px;">
                    <div class="wpb_animate_when_almost_visible wpb_fadeIn fadeIn wpb_column vc_column_container vc_col-sm-6 wpb_start_animation animated">
                      <div class="vc_column-inner">
                        <div class="wpb_wrapper">
                          <div class="woocommerce columns-3 ">
                            <ul class="products columns-3 js_animated">
                              @if (!$shoesOfCategory->shoes->isEmpty())
                                @foreach ($shoesOfCategory->shoes as $itemShoesCate)
                                  <li class="product type-product post-612 status-publish first instock product_cat-men product_cat-shoes has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
                                    <div class="main-container">
                                      <div class="product_image_wrapper">
                                        <div class="product_badges_wrapper">
                                          @if ($itemShoesCate->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($itemShoesCate->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($itemShoesCate->end_date_sale)->format('Y-m-d H:i:s')))  
                                            <span class="onsale">Sale!</span>
                                          @endif
                                        </div>
                                        <div class="product_image with_second_image second_image_loaded">
                                          <a href="#">
                                            @php
                                              $itemShoesCateImage = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$itemShoesCate->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$itemShoesCate->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                            @endphp
                                            <span class="product_second_image" style="background-image:url({{ $itemShoesCateImage }})">
                                            </span>
                                            <img style="width: 160px; height: 180px;" src="{{ $itemShoesCateImage }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">				
                                          </a>
                                        </div>
                                      </div>
                                      <div class="second-container">
                                        <div class="product_info">
                                          <a href="#" class="title">
                                            <h2 class="woocommerce-loop-product__title">{{ $itemShoesCate->name }}
                                            </h2>
                                          </a>
                                          <span class="price">
                                            <span class="woocommerce-Price-amount amount">
                                              @if ($itemShoesCate->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($itemShoesCate->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($itemShoesCate->end_date_sale)->format('Y-m-d H:i:s'))) 
                                                <span class="woocommerce-Price-currencySymbol">$ </span> {{ $shoesSale->price_sale }}
                                                <del>
                                                  <span class="woocommerce-Price-amount amount" style="color: red">
                                                    <span class="woocommerce-Price-currencySymbol" style="color: red">$</span>
                                                    {{ $shoesSale->price }}
                                                  </span>
                                                </del>
                                              @else
                                                <span class="woocommerce-Price-currencySymbol">$ </span> {{ $shoesSale->price }}
                                              @endif
                                            </span>
                                          </span>
                                        </div>
                                        <div class="buttons" style="height: auto;">
                                          <a href="/pages/home-sneaker-collections/?add_to_wishlist=612" data-product-id="612" data-product-type="simple" data-wishlist-url="https://thehanger.wp-theme.design/wishlist/" data-browse-wishlist-text="Browse Wishlist" class="getbowtied_product_wishlist_button add_to_wishlist" rel="nofollow">
                                            <span class="tooltip">
                                              Add to Wishlist				
                                            </span>
                                          </a>			
                                          <a href="#" class="getbowtied_product_quick_view_button" data-product_id="612" rel="nofollow">
                                            <span class="tooltip">Quick View
                                            </span>
                                          </a>
                                          <a href="?add-to-cart=612" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="612" data-product_sku="" aria-label="Add “Black mesh sock sneakers” to your cart" rel="nofollow">
                                            <span class="tooltip">Add to cart
                                            </span>
                                          </a>			
                                        </div>
                                      </div>
                                    </div>
                                  </li>
                                @endforeach
                              @endif
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-6">
                      <div class="vc_column-inner vc_custom_1519818775532">
                        <div class="wpb_wrapper">
                          <div class="woocommerce columns-1">
                            <ul class="products columns-1 js_animated">
                              <li class="product-category product first visible animation_ready animated">
                                <a href="{{ route('product_category', $shoesOfCategory->slug) }}">
                                  <span class="getbowtied-subcategory-image" style="background-image :url({{ $shoesOfCategoryImage }});">
                                  </span>			
                                  <h2 class="woocommerce-loop-category__title">
                                    {{ $shoesOfCategory->name }}
                                    <mark class="count"> {{ count($shoesOfCategory->shoes) }}
                                    </mark>			
                                  </h2>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="vc_btn3-container vc_btn3-center">
                      <a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-flat vc_btn3-color-black" href="shop/index92f8.html?on-sale=1" title="">Show More
                      </a>
                    </div>
                  </div>
                  <div class="vc_row-full-width vc_clearfix"></div>
                @endif
              @endforeach
              <div class="vc_row-full-width vc_clearfix"></div>
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
