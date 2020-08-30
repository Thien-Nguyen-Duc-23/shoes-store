<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-xs hidden-sm hidden-md wrap_right_module">
    <div class="right_module margin-bottom-50">
        <div class="module_service_details">
            <div class="wrap_module_service">
                <div class="item_service">
                    <div class="wrap_item_">
                        <div class="content_service">
                            <p>Giao hàng siêu tốc</p>
                            <span>Nhận hàng trong 24-72h</span>
                        </div>
                    </div>
                </div>

                <div class="item_service">
                    <div class="wrap_item_">
                        <div class="content_service">
                            <p>7 ngày đổi hàng dễ dàng</p>
                            <span>Đổi nhanh chóng và dễ dàng</span>
                        </div>
                    </div>
                </div>

                <div class="item_service">
                    <div class="wrap_item_">
                        <div class="content_service">
                            <p>Bảo hành chính hãng</p>
                            <span>Bảo hành chính hãng 1 tháng</span>
                        </div>
                    </div>
                </div>

                <div class="item_service">
                    <div class="wrap_item_">
                        <div class="content_service">
                            <p>Giá tốt nhất</p>
                            <span>Tích điểm với 5% với Wear</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="module_best_sale_product">
                <div class="title_module_">
                    <h2 class="title"><a href="san-pham-noi-bat" title="Có thể bạn thích">Có thể bạn thích</a></h2>
                </div>
                <div class="sale_off_today">
                    <div class="not-dqowl wrp_list_product">
                        @if(!empty($rateShoes))
                            @foreach ($rateShoes as $rateItem)
                                <div class="item_small">
                                    <div class="product-mini-item clearfix on-sale">
                                        @php
                                        $rateItemImage = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$rateItem->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$rateItem->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                        @endphp
                                        <a href="{{ route('product_detail', $rateItem->slug) }}" class="product-img">
                                            <img src="{{ $rateItemImage }}" alt="{{ $rateItem->name }}" />
                                        </a>

                                        <div class="product-info">
                                            <h3>
                                                <a href="{{ route('product_detail', $rateItem->slug) }}" title="{{ $rateItem->name }}" class="product-name text3line">
                                                    {{ $rateItem->name }}
                                                </a>
                                            </h3>
                                            <div class="price-box">
                                                @if ($rateItem->is_sale == \App\Models\Shoes::IS_SALE && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($rateItem->start_date_sale)->format('Y-m-d H:i:s')) && \Carbon\Carbon::now()->lte(\Carbon\Carbon::parse($rateItem->end_date_sale)->format('Y-m-d H:i:s')))
                                                    
                                                    <span class="price"><span class="price product-price">{{ $rateItem->formartToVND($rateItem->price_sale) ?? null }}</span> </span>
                                                    <!-- Giá Khuyến mại -->

                                                    <span class="old-price"><del class="sale-price">{{ $rateItem->formartToVND($rateItem->price) ?? null }}</del> </span>
                                                    <!-- Giá gốc -->
                                                @else
                                                    <span class="price"><span class="price product-price">{{ $rateItem->formartToVND($rateItem->price) ?? null }}</span> </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
