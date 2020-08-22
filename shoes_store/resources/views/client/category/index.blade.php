@extends('client.layout.app')

@section('content-client')
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
                <!-- include header SM-->
                @includeIf('client.category.sidebar')
                <!-- include header SM-->
                <div class="small-12 large-9 columns">
                  <div class="site-main-content-wrapper">
                    <div class="shop_header_placeholder">
                      <header class="woocommerce-archive-header">
                        <div class="woocommerce-archive-header-inside">
                          <h1 class="woocommerce-products-header__title woocommerce-archive-header-title page-title">
                            Jackets &amp; Coats&nbsp;
                            <span class="category-title-count">
                              2 items											
                            </span>
                          </h1>
                          <div class="woocommerce-archive-header-tools site-secondary-font site-secondary-color">
                            <span class="filters-button with-filters">Filters
                            </span>
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
                              <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 110px;">
                                <span class="selection">
                                  <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-orderby-az-container">
                                    <span class="select2-selection__rendered" id="select2-orderby-az-container" title="Sort by latest">Sort by latest
                                    </span>
                                    <span class="select2-selection__arrow" role="presentation">
                                      <b role="presentation">
                                      </b>
                                    </span>
                                  </span>
                                </span>
                                <span class="dropdown-wrapper" aria-hidden="true">
                                </span>
                              </span>
                              <input type="hidden" name="paged" value="1">
                            </form>
                            <div class="shop-tools">
                              <span class="shop-display-grid active">
                                <i class="thehanger-icons-display-grid">
                                </i>
                              </span>
                              <span class="shop-display-list">
                                <i class="thehanger-icons-display-list">
                                </i>
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
                                    <a class="site-secondary-font" href="https://thehanger.wp-theme.design/shop/?new-products=1">  
                                      <i class="thehanger-icons-ui_star">
                                      </i>   New Products
                                    </a>
                                    <span class="count">8
                                    </span>
                                  </li>
                                  <li class="cat-item">
                                    <a class="site-secondary-font" href="https://thehanger.wp-theme.design/shop/?on-sale=1"> 
                                      <i class="thehanger-icons-ecommerce_discount-symbol">
                                      </i>  On Sale!
                                    </a>
                                    <span class="count">8
                                    </span>
                                  </li>
                                  <li class="cat-item cat-item-15 cat-parent">
                                    <a class="site-secondary-font" href="https://thehanger.wp-theme.design/product-category/women/">
                                      <i class="thehanger-icons-clothes_dress-4">
                                      </i>Women
                                    </a> 
                                    <span class="count">48
                                    </span>
                                    <span class="dropdown_icon thehanger-icons-arrow-down-dark">
                                    </span>
                                    <ul class="children">
                                      <li class="cat-item cat-item-92">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/women/coats-jackets/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Coats &amp; Jackets
                                        </a> 
                                        <span class="count">2
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-79">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/women/dresses/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Dresses
                                        </a> 
                                        <span class="count">2
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-47">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/women/hoodies-sweatshirts/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Hoodies &amp; Sweatshirts
                                        </a> 
                                        <span class="count">2
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-49">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/women/jumpers-cardigans/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Jumpers &amp; Cardigans
                                        </a> 
                                        <span class="count">10
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-82">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/women/loungewear/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Loungewear
                                        </a> 
                                        <span class="count">3
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-85">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/women/ripped-jeans/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Ripped Jeans
                                        </a> 
                                        <span class="count">1
                                        </span>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="cat-item cat-item-33 cat-parent active current-cat-parent active-item">
                                    <a class="site-secondary-font" href="https://thehanger.wp-theme.design/product-category/men/">
                                      <i class="thehanger-icons-clothes_t-shirt">
                                      </i>Men
                                    </a> 
                                    <span class="count">46
                                    </span>
                                    <span class="dropdown_icon thehanger-icons-arrow-down-dark">
                                    </span>
                                    <ul class="children">
                                      <li class="cat-item cat-item-46">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/men/activewear/">
                                          <i class="">
                                          </i>Activewear
                                        </a> 
                                        <span class="count">1
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-45 current-cat active-item">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/men/jackets-coats/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Jackets &amp; Coats
                                        </a> 
                                        <span class="count">2
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-43">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/men/jeans/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Jeans
                                        </a> 
                                        <span class="count">1
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-53">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/men/t-shirts/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>T-Shirts
                                        </a> 
                                        <span class="count">1
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-44">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/men/basics/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Basics
                                        </a> 
                                        <span class="count">8
                                        </span>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="cat-item cat-item-34 cat-parent">
                                    <a class="site-secondary-font" href="https://thehanger.wp-theme.design/product-category/junior/">
                                      <i class="thehanger-icons-clothes_baby-hoodie">
                                      </i>Junior
                                    </a> 
                                    <span class="count">26
                                    </span>
                                    <span class="dropdown_icon thehanger-icons-arrow-down-dark">
                                    </span>
                                    <ul class="children">
                                      <li class="cat-item cat-item-100">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/junior/knitwear/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Knitwear
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-87">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/junior/onesies/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Onesies
                                        </a> 
                                        <span class="count">1
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-48">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/junior/toys-games/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Toys &amp; Games
                                        </a> 
                                        <span class="count">10
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-54">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/junior/socks-tights/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Socks &amp; Tights
                                        </a> 
                                        <span class="count">1
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-83">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/junior/sunglasses/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Sunglasses
                                        </a> 
                                        <span class="count">1
                                        </span>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="cat-item cat-item-35 cat-parent">
                                    <a class="site-secondary-font" href="https://thehanger.wp-theme.design/product-category/accessories/">
                                      <i class="thehanger-icons-clothes_baseball-hat">
                                      </i>Accessories
                                    </a> 
                                    <span class="count">12
                                    </span>
                                    <span class="dropdown_icon thehanger-icons-arrow-down-dark">
                                    </span>
                                    <ul class="children">
                                      <li class="cat-item cat-item-99">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/accessories/bags-backpacks/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Bags &amp; Backpacks
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-95">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/accessories/hats-beanies/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Hats &amp; Beanies
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-97">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/accessories/iphone-cases/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>iPhone Cases
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-98">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/accessories/socks-tights-accessories/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Socks &amp; Tights
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-81">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/accessories/tech/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Tech
                                        </a> 
                                        <span class="count">2
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-96">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/accessories/wallets/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Wallets
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="cat-item cat-item-36 cat-parent">
                                    <a class="site-secondary-font" href="https://thehanger.wp-theme.design/product-category/gifts/">
                                      <i class="thehanger-icons-party_present-gift">
                                      </i>Gifts
                                    </a> 
                                    <span class="count">12
                                    </span>
                                    <span class="dropdown_icon thehanger-icons-arrow-down-dark">
                                    </span>
                                    <ul class="children">
                                      <li class="cat-item cat-item-103">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/gifts/books/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Books
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-104">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/gifts/gift-cards/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Gift Cards
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-101">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/gifts/gifts-for-her/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Gifts for Her
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-102">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/gifts/novelty-gifts/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Novelty Gifts
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-94">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/gifts/gifts-for-him/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Gifts for Him
                                        </a> 
                                        <span class="count">5
                                        </span>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="cat-item cat-item-37 cat-parent">
                                    <a class="site-secondary-font" href="https://thehanger.wp-theme.design/product-category/bottoms/">
                                      <i class="thehanger-icons-clothes_pants">
                                      </i>Bottoms
                                    </a> 
                                    <span class="count">20
                                    </span>
                                    <span class="dropdown_icon thehanger-icons-arrow-down-dark">
                                    </span>
                                    <ul class="children">
                                      <li class="cat-item cat-item-89">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/bottoms/biker-jackets/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Biker Jackets
                                        </a> 
                                        <span class="count">1
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-86">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/bottoms/parkas/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Parkas
                                        </a> 
                                        <span class="count">1
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-57">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/bottoms/shorts/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Shorts
                                        </a> 
                                        <span class="count">6
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-71">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/bottoms/skinny-jeans/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Skinny Jeans
                                        </a> 
                                        <span class="count">5
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-42">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/bottoms/trousers-leggings/">
                                          <i class="thehanger-icons-alignment_align-all-1">
                                          </i>Trousers &amp; Leggings
                                        </a> 
                                        <span class="count">1
                                        </span>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="cat-item cat-item-39 cat-parent">
                                    <a class="site-secondary-font" href="https://thehanger.wp-theme.design/product-category/shoes/">
                                      <i class="thehanger-icons-clothes_trendy-shoes">
                                      </i>Shoes
                                    </a> 
                                    <span class="count">23
                                    </span>
                                    <span class="dropdown_icon thehanger-icons-arrow-down-dark">
                                    </span>
                                    <ul class="children">
                                      <li class="cat-item cat-item-107">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/shoes/men-shoes/">
                                          <i class="theretailerpro-icons-clothes_sport-shoes">
                                          </i>Men Shoes
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-108">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/shoes/women-shoes/">
                                          <i class="theretailerpro-icons-clothes_gentlement-shoes">
                                          </i>Women Shoes
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                      <li class="cat-item cat-item-109">
                                        <a class="" href="https://thehanger.wp-theme.design/product-category/shoes/junior-shoes/">
                                          <i class="theretailerpro-icons-alignment_align-all-1">
                                          </i>Junior
                                        </a> 
                                        <span class="count">0
                                        </span>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="cat-item cat-item-38">
                                    <a class="site-secondary-font" href="https://thehanger.wp-theme.design/product-category/tops/">
                                      <i class="thehanger-icons-clothes_shirt">
                                      </i>Tops
                                    </a> 
                                    <span class="count">25
                                    </span>
                                  </li>
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
                                    <h4 class="widget-title">Filter by Size
                                    </h4>
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
                                    <h4 class="widget-title">Filter by Price
                                    </h4>
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
                    <div class="row">
                      <div class="large-12 columns">
                        <div class="site-main-content" id="sticky_bottom_anchor">
                          <div class="woocommerce-notices-wrapper">
                          </div>
                          <ul class="products columns-3 js_animated">
                            <li class="flex-break visible animation_ready animated">
                            </li>
                            <li class="product type-product post-141 status-publish first instock product_cat-basics product_cat-jackets-coats product_cat-men has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
                              <div class="main-container">
                                <div class="product_image_wrapper">
                                  <div class="product_badges_wrapper">
                                  </div>
                                  <div class="product_image with_second_image second_image_loaded">
                                    <a href="https://thehanger.wp-theme.design/shop/men/basics/ripped-skinny-fit-jeans/">
                                      <span class="product_second_image" style="background-image:url(https://thehanger.wp-theme.design/wp-content/uploads/5332251400_2_1_1-330x413.jpg)">
                                      </span>
                                      <img width="330" height="413" src="https://thehanger.wp-theme.design/wp-content/uploads/5332251400_1_1_1-330x413.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">				
                                    </a>
                                  </div>
                                </div>
                                <div class="second-container">
                                  <div class="product_info">
                                    <a href="https://thehanger.wp-theme.design/shop/men/basics/ripped-skinny-fit-jeans/" class="title">
                                      <h2 class="woocommerce-loop-product__title">Ripped Skinny Fit Jeans
                                      </h2>
                                    </a>
                                    <span class="price">
                                      <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$
                                        </span>39
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
                            <li class="product type-product post-134 status-publish instock product_cat-basics product_cat-jackets-coats product_cat-men has-post-thumbnail shipping-taxable purchasable product-type-simple visible animation_ready animated">
                              <div class="main-container">
                                <div class="product_image_wrapper">
                                  <div class="product_badges_wrapper">
                                  </div>
                                  <div class="product_image ">
                                    <a href="https://thehanger.wp-theme.design/shop/men/basics/red-lace-up-sneakers/">
                                      <span class="product_second_image" style="">
                                      </span>
                                      <img width="330" height="413" src="https://thehanger.wp-theme.design/wp-content/uploads/4900232020_1_1_1-330x413.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">				
                                    </a>
                                  </div>
                                </div>
                                <div class="second-container">
                                  <div class="product_info">
                                    <a href="https://thehanger.wp-theme.design/shop/men/basics/red-lace-up-sneakers/" class="title">
                                      <h2 class="woocommerce-loop-product__title">Red Lace-up Sneakers
                                      </h2>
                                    </a>
                                    <span class="price">
                                      <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol">$
                                        </span>792
                                      </span>
                                    </span>
                                  </div>
                                  <div class="buttons" style="height: auto;">
                                    <a href="/product-category/men/jackets-coats/?add_to_wishlist=134" data-product-id="134" data-product-type="simple" data-wishlist-url="https://thehanger.wp-theme.design/wishlist/" data-browse-wishlist-text="Browse Wishlist" class="getbowtied_product_wishlist_button add_to_wishlist" rel="nofollow">
                                      <span class="tooltip">
                                        Add to Wishlist				
                                      </span>
                                    </a>			
                                    <a href="#" class="getbowtied_product_quick_view_button" data-product_id="134" rel="nofollow">
                                      <span class="tooltip">Quick View
                                      </span>
                                    </a>
                                    <a href="?add-to-cart=134" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="134" data-product_sku="" aria-label="Add “Red Lace-up Sneakers” to your cart" rel="nofollow">
                                      <span class="tooltip">Add to cart
                                      </span>
                                    </a>			
                                  </div>
                                </div>
                              </div>
                            </li>
                          </ul>
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
