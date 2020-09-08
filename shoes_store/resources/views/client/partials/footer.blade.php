<!-- .site-content-wrapper -->
<div class="site-prefooter">
    <div class="row small-collapse">
        <div class="large-12 columns">
        <div class="prefooter-content">
            <aside class="widget-area">
            <div class="row small-up-1 medium-up-2 large-up-4">
                <div class="column">
                <aside id="theme_ecommerce_info-6" class="widget widget_theme_ecommerce_info">
                    <div class="ecommerce-info-widget-txt-wrapper">
                    <div class="ecommerce-info-widget-title">
                        <div class="ecommerce-info-widget-icon">
                        <i class="thehanger-icons-ecommerce_box-2">
                        </i>
                        </div>
                        <h4 class="widget-title">Free Worldwide Shipping
                        </h4>
                    </div>
                    <div class="ecommerce-info-widget-subtitle">On all orders over $75.00
                    </div>
                    </div>
                </aside>
                </div>
                <div class="column">
                <aside id="theme_ecommerce_info-5" class="widget widget_theme_ecommerce_info">
                    <div class="ecommerce-info-widget-txt-wrapper">
                    <div class="ecommerce-info-widget-title">
                        <div class="ecommerce-info-widget-icon">
                        <i class="thehanger-icons-ecommerce_accepted-cards">
                        </i>
                        </div>
                        <h4 class="widget-title">100% Secure Checkout
                        </h4>
                    </div>
                    <div class="ecommerce-info-widget-subtitle">PayPal / MasterCard / Visa
                    </div>
                    </div>
                </aside>
                </div>
                <div class="column">
                <aside id="theme_ecommerce_info-8" class="widget widget_theme_ecommerce_info">
                    <div class="ecommerce-info-widget-txt-wrapper">
                    <div class="ecommerce-info-widget-title">
                        <div class="ecommerce-info-widget-icon">
                        <i class="thehanger-icons-ecommerce_24h-support">
                        </i>
                        </div>
                        <h4 class="widget-title">International Warranty
                        </h4>
                    </div>
                    <div class="ecommerce-info-widget-subtitle">Offered in the country of usage
                    </div>
                    </div>
                </aside>
                </div>
                <div class="column">
                <aside id="theme_ecommerce_info-3" class="widget widget_theme_ecommerce_info">
                    <div class="ecommerce-info-widget-txt-wrapper">
                    <div class="ecommerce-info-widget-title">
                        <div class="ecommerce-info-widget-icon">
                        <i class="thehanger-icons-ecommerce_shopping-coupons">
                        </i>
                        </div>
                        <h4 class="widget-title">Easy 30 Days Returns
                        </h4>
                    </div>
                    <div class="ecommerce-info-widget-subtitle">30 days money back guarantee
                    </div>
                    </div>
                </aside>
                </div>							
            </div>
            </aside>
            <div class="hover_overlay_footer">
            </div>
        </div>	
        </div>
    </div>
</div>
<footer class="site-footer">
    <div class="footer-style-1">
        <div class="row small-collapse">
        <div class="large-12 columns">
            <div class="footer-content">
            <div class="trigger-footer-widget-area">
                <span class="trigger-footer-widget-icon thehanger-icons-ui_expand">
                </span>
            </div>
            <aside class="widget-area">
                <div class="row small-up-1 medium-up-2 large-up-6">
                <div class="column">
                    <aside id="woocommerce_product_search-2" class="widget woocommerce widget_product_search">
                    <form role="search" method="get" class="woocommerce-product-search" action="https://thehanger.wp-theme.design/">
                        <label class="screen-reader-text" for="woocommerce-product-search-field-1">Search for:
                        </label>
                        <input type="search" id="woocommerce-product-search-field-1" class="search-field" placeholder="Search products&hellip;" value="" name="s" />
                        <button type="submit" value="Search">Search
                        </button>
                        <input type="hidden" name="post_type" value="product" />
                    </form>
                    </aside>
                </div>
                <div class="column">
                    <aside id="nav_menu-2" class="widget widget_nav_menu">
                    <h4 class="widget-title">Shop Highlights</h4>
                    <div class="menu-footer-shop-highlights-container">
                        <ul id="menu-footer-shop-highlights" class="">
                            @foreach ($categoriesShareView as $itemCategoryShareView)
                                <li id="menu-item-98" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-98">
                                    <a href="{{ route('product_category', $itemCategoryShareView->slug) }}">{{ $itemCategoryShareView->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    </aside>
                </div>
                <div class="column">
                    <aside id="nav_menu-3" class="widget widget_nav_menu">
                    <h4 class="widget-title">Our Company
                    </h4>
                    <div class="menu-footer-our-company-container">
                        <ul id="menu-footer-our-company" class="">
                        <li id="menu-item-93" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-93">
                            <a href="#">About Us
                            </a>
                        </li>
                        <li id="menu-item-94" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-94">
                            <a href="#">Our Studio
                            </a>
                        </li>
                        <li id="menu-item-95" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-95">
                            <a href="#">Careers
                            </a>
                        </li>
                        <li id="menu-item-96" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-96">
                            <a href="#">Community
                            </a>
                        </li>
                        <li id="menu-item-97" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-97">
                            <a href="#">Store Locations
                            </a>
                        </li>
                        </ul>
                    </div>
                    </aside>
                </div>
                <div class="column">
                    <aside id="nav_menu-4" class="widget widget_nav_menu">
                    <h4 class="widget-title">Customer Support
                    </h4>
                    <div class="menu-footer-customer-support-container">
                        <ul id="menu-footer-customer-support" class="">
                        <li id="menu-item-88" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-88">
                            <a href="the-blog/index.html">The Blog
                            </a>
                        </li>
                        <li id="menu-item-89" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-89">
                            <a href="#">Contact
                            </a>
                        </li>
                        <li id="menu-item-90" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-90">
                            <a href="#">FAQs
                            </a>
                        </li>
                        <li id="menu-item-91" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-91">
                            <a href="#">Order Tracking
                            </a>
                        </li>
                        <li id="menu-item-92" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-92">
                            <a href="#">Shipping and Returns
                            </a>
                        </li>
                        </ul>
                    </div>
                    </aside>
                </div>							
                </div>
            </aside>
            <div class="row align-top">
                <div class="large-6 small-12 columns">
                <div class="footer-navigation">
                    <nav class="navigation-foundation">
                    <ul id="menu-footer-menu" class="dropdown menu" data-dropdown-menu data-hover-delay="250" data-closing-time="250">
                        <li id="menu-item-104" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-104">
                        <a href="#">
                            <span>Payment
                            </span>
                        </a>
                        </li>
                        <li id="menu-item-105" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-105">
                        <a href="#">
                            <span>Shipping &#038; Returns
                            </span>
                        </a>
                        </li>
                        <li id="menu-item-107" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-107">
                        <a href="#">
                            <span>Gift Cards
                            </span>
                        </a>
                        </li>
                        <li id="menu-item-108" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-108">
                        <a href="#">
                            <span>Privacy Policy
                            </span>
                        </a>
                        </li>
                        <li id="menu-item-109" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-109">
                        <a href="#">
                            <span>Stockists
                            </span>
                        </a>
                        </li>
                    </ul>									
                    </nav>
                </div>
                <div class="footer-text">
                    © The Hanger — Exclusively on the Envato Market							
                </div>
                </div>
                <div class="large-6 small-12 columns">
                <div class="footer-credit-card-icons">
                </div>
                </div>
            </div>
            <div class="hover_overlay_footer">
            </div>
            </div>
        </div>
        </div>
    </div>
</footer>
<div class="site-content" id="getbowtied_woocommerce_quickview">
    <div class="getbowtied_qv_content site-content">
    </div>
</div>
