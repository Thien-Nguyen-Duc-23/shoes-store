<div class="shop_header_placeholder">
    <header class="woocommerce-archive-header">
        <div class="woocommerce-archive-header-inside">
            <h1 class="woocommerce-products-header__title woocommerce-archive-header-title page-title">
                {{ isset($cateName) ? $cateName : $resultProducts->name }} 
                <span class="category-title-count" style="padding-left: 10px;">
                    @if(!isset($cateName))
                        {{ !$resultProducts->shoes->isEmpty() ? count($resultProducts->shoes) : 0 }} items
                    @endif									
                </span>
            </h1>
            <div class="woocommerce-archive-header-tools site-secondary-font site-secondary-color">
                <span class="filters-button with-filters">Filters</span>
                <form class="woocommerce-ordering" method="get">
                    <select name="orderby" class="orderby select2-hidden-accessible" aria-label="Shop order" tabindex="-1" aria-hidden="true">
                        <option value="popularity">Sort by popularity
                        </option>
                        <option value="rating">Sort by average rating
                        </option>
                        <option value="date" selected="selected">Sort by latest
                        </option>
                        <option value="price">Sort by price: low to high
                        </option>
                        <option value="price-desc">Sort by price: high to low
                        </option>
                    </select>
                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                    <input type="hidden" name="paged" value="1">
                </form>
                <div class="shop-tools">
                    <span class="shop-display-grid active">
                        <i class="thehanger-icons-display-grid"></i>
                    </span>
                    <span class="shop-display-list">
                        <i class="thehanger-icons-display-list"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="site-shop-filters">
            <div class="site-shop-filters-inside">
                <aside class="widget-area shop-widget-area hide-for-large">
                    <aside class="widget woocommerce widget_product_categories_with_icon">
                        <ul class="product-categories-with-icon">
                            <li class="cat-item">
                                <a class="site-secondary-font" href="{{ route('product_category', 'new') }}">  
                                    <i class="thehanger-icons-ui_star"></i>   New Products
                                </a>
                                <span class="count">{{ count($newProducts) }}</span>
                            </li>
                            <li class="cat-item">
                                <a class="site-secondary-font" href="{{ route('product_category', 'is-sale') }}"> 
                                    <i class="thehanger-icons-ecommerce_discount-symbol"></i>  On Sale!
                                </a>
                                <span class="count">{{ count($saleProducts) }}</span>
                            </li>
                            @foreach ($categories as $category)
                                <li class="cat-item cat-item-15 cat-parent">
                                    <a class="site-secondary-font" href="{{ route('product_category', $category->slug) }}">
                                        <i class="thehanger-icons-clothes_dress-4">
                                        </i>{{ $category->name }}
                                    </a>
                                    @php
                                        $sumShoes = !$category->children->isEmpty() && !empty($category->children->shoes) ? (count($category->children->shoes) + count($category->shoes)) : count($category->shoes);  
                                    @endphp
                                    <span class="count">{{ $sumShoes }}</span>
                                    @if (!$category->children->isEmpty())
                                        <span class="dropdown_icon thehanger-icons-arrow-down-dark"></span>
                                        <ul class="children">
                                            @foreach ($category->children as $categoryChill)
                                                <li class="cat-item cat-item-92">
                                                    <a class="" href="{{ route('product_category', $categoryChill->slug) }}">
                                                        <i class="thehanger-icons-alignment_align-all-1">
                                                        </i>{{ $categoryChill->name }}
                                                    </a> 
                                                    <span class="count">{{ count($categoryChill->shoes) }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                </aside>
                <aside class="widget-area">
                    <div class="row small-up-1 medium-up-2 large-up-3 shop-filters-area-content">
                        <div class="column">
                            <aside id="woocommerce_layered_nav-3" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
                            <h4 class="widget-title">Filter by Color
                            </h4>
                            <ul class="woocommerce-widget-layered-nav-list">
                                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                                <a rel="nofollow" href="https://thehanger.wp-theme.design/product-category/men/jackets-coats/?filter_color=camel">Camel
                                </a> 
                                <span class="count">1
                                </span>
                                </li>
                            </ul>
                            </aside>
                        </div>
                        <div class="column">
                            <aside id="woocommerce_layered_nav-4" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
                                <h4 class="widget-title">Filter by Size</h4>
                                <ul class="woocommerce-widget-layered-nav-list">
                                    <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                                    <a rel="nofollow" href="https://thehanger.wp-theme.design/product-category/men/jackets-coats/?filter_size=s">S
                                    </a> 
                                    <span class="count">2
                                    </span>
                                    </li>
                                    <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                                    <a rel="nofollow" href="https://thehanger.wp-theme.design/product-category/men/jackets-coats/?filter_size=m">M
                                    </a> 
                                    <span class="count">2
                                    </span>
                                    </li>
                                    <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term ">
                                    <a rel="nofollow" href="https://thehanger.wp-theme.design/product-category/men/jackets-coats/?filter_size=l">L
                                    </a> 
                                    <span class="count">2
                                    </span>
                                    </li>
                                </ul>
                            </aside>
                        </div>
                        <div class="column">
                            <aside id="woocommerce_price_filter-3" class="widget woocommerce widget_price_filter">
                                <h4 class="widget-title">Filter by Price</h4>
                                <form method="get" action="https://thehanger.wp-theme.design/product-category/men/jackets-coats/">
                                    <div class="price_slider_wrapper">
                                        <div class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" style="">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;">
                                            </div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;">
                                            </span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;">
                                            </span>
                                        </div>
                                        <div class="price_slider_amount" data-step="10">
                                            <input type="text" id="min_price" name="min_price" value="30" data-min="30" placeholder="Min price" style="display: none;">
                                            <input type="text" id="max_price" name="max_price" value="800" data-max="800" placeholder="Max price" style="display: none;">
                                            <button type="submit" class="button">Filter
                                            </button>
                                            <div class="price_label" style="">
                                            Price: 
                                            <span class="from">$30
                                            </span> — 
                                            <span class="to">$800
                                            </span>
                                            </div>
                                            <div class="clear">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </aside>
                        </div>				
                    </div>
                </aside>
            </div>
        </div>
    </header>
</div>
