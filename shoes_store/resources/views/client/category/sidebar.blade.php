<div class="small-12 large-3 columns show-for-large">
    <div class="woocommerce-sidebar-sticky">
        <aside class="site-sidebar site-sidebar--shop widget-area">
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
                        <span class="count">{{ count($saleProducts) }}
                        </span>
                    </li>
                    @foreach ($categories as $category)
                        <li class="cat-item cat-item-15 cat-parent">
                            <a class="site-secondary-font" href="{{ route('product_category', $category->slug) }}">
                                <i class="thehanger-icons-clothes_trendy-shoes"></i> {{ $category->name }}
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
                                                <i class="thehanger-icons-alignment_align-all-1"></i>{{ $categoryChill->name }}
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
        <!-- .site-sidebar -->
    </div>
</div>
