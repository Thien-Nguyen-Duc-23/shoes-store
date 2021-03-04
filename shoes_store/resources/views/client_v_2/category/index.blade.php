@extends('client_v_2.layout.app')

@section('content-client')
    <!-- include category_crumb -->
    @includeIf('client_v_2.category.bread_crumb.index')
    <!-- end include bcategory_crumb -->

    <div class="container">
        <div class="row">					
            <section class="main_container collection margin-bottom-30 col-lg-12">
                <div class="text-sm-left">			
                    <h1 class="title-head margin-top-0">Quần Jeans</h1>
                </div>

                <!-- include filter -->
                @includeIf('client_v_2.category.filter.index')
                <!-- end include filter -->

                <div class="category-products products">
                    @if (!$products->isEmpty())
                        <section class="products-view products-view-grid collection_reponsive">
                            <div class="row">
                                @foreach ($products as $product)
                                    @php
                                        $image = \Storage::disk('public')->exists(\App\Models\Shoes::DIRECTORY.'/'.$product->image) ?  Storage::disk(config('filesystems.public_disk'))->url(\App\Models\Shoes::DIRECTORY.'/'.$product->image) : asset('admin_lte/dist/img/default-50x50.gif');
                                    @endphp
                                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                                        <div class="product-col">
                                            <div class="product-box">															
                                                <div class="product-thumbnail display_flex">
                                                    <a class="image_link" href="{{ route('product_detail', $product->slug) }}" title="{{ $product->name }}">
                                                        <img src="{{ $image }}" data-lazyload="{{ $image }}" alt="{{ $product->name }}">
                                                    </a>
                                                    @if ($product->checkIsSale())
                                                        <div class="product-label"> 
                                                        <strong class="sold-out-label">Sale</strong>
                                                        </div>
                                                    @endif
                                                    <div class="product-action-grid clearfix ">
                                                        <form class="variants form-nut-grid">
                                                            <div>
                                                                <div class="action_btn">
                                                                    <button class="btn-cart button_h left-to" title="Chọn sản phẩm" type="button" onclick="window.location.href='{{ route('product_detail', $product->slug) }}'">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i> Tùy chọn
                                                                    </button>
                                                                </div>
                                                            </div>	
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="product-info a-left">
                                                    <h3 class="product-name"><a href="{{ route('product_detail', $product->slug) }}" title="{{ $product->name }}">{{ $product->name }}</a></h3>
                                                    <div class="price-box clearfix">	
                                                        @if ($product->checkIsSale())
                                                            <span class="price product-price">{{ $product->formartToVND($product->price_sale) ?? null }}</span>
                                                            <span class="price product-price-old">{{ $product->formartToVND($product->price) ?? null }}</span>
                                                        @else
                                                            <span class="price product-price black-price">{{ $product->formartToVND($product->price) ?? null }}</span>
                                                        @endif  
                                                    </div>
                                                </div>
                                            </div>			
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{ $products->render('client_v_2.category.pagination.index') }}
                        </section>
                    @endif	
                </div>
            </section>
        </div>
    </div>
@endsection
