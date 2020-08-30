<div class="col-lg-12 related-product margin-top-20 xs-margin-top-0 margin-bottom-30">
    <div class="section_prd_feature section_base">
        <div class="border_bottom_title clearfix"></div>
        <div class="title_top_menu">
            <h3 class="title-head"><a href="{{ route('product_category', $shoesDetail->categories->slug) }}">Sản phẩm cùng loại</a></h3>
        </div>
        <div
            class="products product_related products-view-grid-bb owl-carousel owl-theme products-view-grid not-dot2"
            data-dot="false"
            data-nav="false"
            data-lg-items="5"
            data-md-items="4"
            data-sm-items="3"
            data-xs-items="2"
            data-margin="15"
        >
            @if(!empty($relationShoes))
                @foreach ($relationShoes as $relationItem)
                    <div class="item saler_item">
                        <div class="owl_item_product product-col-1">
                            <div class="product-box-h">
                                <div class="product-thumbnail">
                                    @php
                                    $relationItemImage = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$relationItem->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$relationItem->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                    @endphp
                                    <a class="image_link display_flex" href="{{ route('product_detail', $relationItem->slug) }}" title="{{ $relationItem->name }}">
                                        <img src="{{ $relationItemImage }}" alt="{{ $relationItem->name }}"/>
                                    </a>

                                    <div class="sale-flash new">Mới</div>

                                    <!-- Tag giá sốc -->

                                    <div class="tagdacbiet_sale sale-flash">
                                        Giá sốc<br />
                                        <div class="font16">
                                            - 30%
                                        </div>
                                    </div>

                                    <!-- End tag giá sốc -->
                                    <!-- Tag Mã KM -->

                                    <!-- End Tag Mã KM -->
                                </div>
                                <div class="product-info a-left">
                                    <h3 class="product-name"><a class="height_name text2line" href="{{ route('product_detail', $relationItem->slug ) }}" title="{{ $relationItem->name }}">{{ $relationItem->name }}</a></h3>
                                    <div class="sapo-product-reviews-badge" data-id="16303202"></div>
                                    <div class="group-status">
                                        <span class="first_status">SKU: <span class="status_name">{{ $relationItem->sku }} </span></span>
                                    </div>

                                    <div class="product-hides">
                                        <div class="product-hide">
                                            <div class="price-box clearfix">
                                                @if ($relationItem->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($relationItem->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($relationItem->end_date_sale)->format('Y-m-d H:i:s')))
                                                    <span class="special-price">
                                                        <span class="price product-price">{{ $relationItem->formartToVND($relationItem->price_sale) ?? null }}</span>
                                                    </span>
                                                    <!-- Giá Khuyến mại -->
                                                    <span class="old-price">
                                                        <del class="price product-price-old">
                                                            {{ $relationItem->formartToVND($relationItem->price) ?? null }}
                                                        </del>
                                                    </span>
                                                    <!-- Giá gốc -->
                                                @else
                                                    <span class="special-price">
                                                        <span class="price product-price">{{ $relationItem->formartToVND($relationItem->price) ?? null }}</span>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-action clearfix hidden-xs">
                                        <form action="/cart/add" method="post" class="variants form-nut-grid" data-id="product-actions-16303202" enctype="multipart/form-data">
                                            <div>
                                                <input class="hidden" type="hidden" name="variantId" value="28947461" />
                                                <button class="btn btn-cart btn btn-circle left-to" title="Chọn sản phẩm" type="button" onclick="window.location.href='/vans-sk8-hi-alien-ghosts-vn0a4bv6tb1'">
                                                    <i class="fa fa-shopping-basket"></i>Tùy chọn
                                                </button>

                                                <a
                                                    title="Xem nhanh"
                                                    href="/vans-sk8-hi-alien-ghosts-vn0a4bv6tb1"
                                                    data-handle="vans-sk8-hi-alien-ghosts-vn0a4bv6tb1"
                                                    class="xem_nhanh btn-circle btn_view btn right-to quick-view hidden-xs hidden-sm hidden-md"
                                                >
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
