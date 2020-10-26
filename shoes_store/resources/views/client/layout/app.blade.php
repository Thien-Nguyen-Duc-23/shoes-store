<!DOCTYPE html>
<html lang="en-US" class="no-js">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>The Hanger &#8211; Exlusively on the Envato Market</title>
    <script type='text/javascript' src="{{ asset('client/wp-includes/js/jquery/jquery4a5f.js') }}"></script>
    <link rel='stylesheet' id='yith-wcwl-font-awesome-css'  href="{{ asset('client/wp-content/plugins/yith-woocommerce-wishlist/assets/css/font-awesome1849.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='getbowtied-th-widget-styles-css'  href="{{ asset('client/wp-content/plugins/the-hanger-extender/includes/widgets/assets/css/widget-product-categories-with-icon7661.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='th-social-media-styles-css'  href="{{ asset('client/wp-content/plugins/the-hanger-extender/includes/social-media/assets/css/social-media7661.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='getbowtied_icons-css'  href="{{ asset('client/wp-content/themes/the-hanger/inc/fonts/thehanger-icons/style905d.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='select2-css'  href="{{ asset('client/wp-content/plugins/woocommerce/assets/css/select2b2f9.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='swiper-css'  href="{{ asset('client/wp-content/themes/the-hanger/inc/_vendor/swiper/css/swiper4f24.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='thehanger-styles-css'  href="{{ asset('client/wp-content/themes/the-hanger/css/styles905d.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='thehanger-styles-css'  href="{{ asset('css/client/custom-css-page.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='getbowtied-th-ecommerce-widget-styles-css'  href="{{ asset('client/wp-content/plugins/the-hanger-extender/includes/widgets/assets/css/widget-ecommerce-info7661.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='js_composer_front-css'  href="{{ asset('client/wp-content/plugins/js_composer/assets/css/js_composer.min10df.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='getbowtied-default-fonts-css'  href="{{ asset('client/wp-content/themes/the-hanger/inc/fonts/default905d.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='owl-css'  href="{{ asset('css/owl.carousel.min.css') }}" type='text/css' media='all' />
    <link rel='stylesheet' id='custom-css'  href="{{ asset('css/custom.css') }}" type='text/css' media='all' />
    <script type="text/template" id="tmpl-unavailable-variation-template">
	    <p>Sorry, this product is unavailable. Please choose a different combination.</p>
    </script>
    <script type='text/javascript' src="{{ asset('client/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min6b25.js') }}"></script>
    <script type='text/javascript' src="{{ asset('client/wp-content/plugins/pixelyoursite-pro/dist/scripts/jquery.bind-first-0.2.3.min7661.js') }}"></script>
    <style>
      .text-danger {
        color: red !important;
        border-color: red;
      }

      .custom-span {
        font-size: 12px;
      }
    </style>
  </head>

  @if (url()->current() == config('app.url'))
    <body class="home page-template-default page page-id-572 page-child parent-pageid-564 wp-embed-responsive theme-the-hanger woocommerce-js wpb-js-composer js-comp-ver-6.2.0 vc_responsive site-main-font header-layout-full content-layout-full page-without-title footer-layout-full">
  @elseif (Route::currentRouteName() === 'product_detail')
    <body class="product-template-default single single-product postid-248 wp-embed-responsive theme-the-hanger woocommerce woocommerce-page woocommerce-js wpb-js-composer js-comp-ver-6.3.0 vc_responsive site-main-font header-layout-full content-layout-full  footer-layout-full">
  @elseif (Route::currentRouteName() === 'product_cart')
    <body class="page-template-default page page-id-6 wp-embed-responsive theme-the-hanger woocommerce-cart woocommerce-page woocommerce-js wpb-js-composer js-comp-ver-6.3.0 vc_responsive site-main-font header-layout-full content-layout-full  footer-layout-full">
  @elseif (Route::currentRouteName() === 'index_login' || Route::currentRouteName() === 'index_register')
    <body class="page-template-default page page-id-8 wp-embed-responsive theme-the-hanger woocommerce-account woocommerce-page woocommerce-js wpb-js-composer js-comp-ver-6.3.0 vc_responsive site-main-font header-layout-full content-layout-full  footer-layout-full">
  @elseif (Route::currentRouteName() === 'news')
    <body class="blog wp-embed-responsive theme-the-hanger woocommerce-js wpb-js-composer js-comp-ver-6.3.0 vc_responsive site-main-font header-layout-full content-layout-full blog-sidebar-active blog-sidebar-right  blog-pagination-infinite_scroll footer-layout-full">
  @elseif (Route::currentRouteName() === 'news_detail')
    <body class="post-template-default single single-post postid-76 single-format-standard wp-embed-responsive theme-the-hanger woocommerce-js wpb-js-composer js-comp-ver-6.4.1 vc_responsive site-main-font header-layout-full content-layout-full blog-sidebar-inactive  footer-layout-full">
  @else
    <body class="archive tax-product_cat term-jackets-coats term-45 wp-embed-responsive theme-the-hanger woocommerce woocommerce-page woocommerce-js wpb-js-composer js-comp-ver-6.2.0 vc_responsive site-main-font header-layout-full content-layout-full  woocommerce-shop shop-pagination-infinite_scroll shop-sidebar-active shop-sidebar-left blog-pagination-infinite_scroll footer-layout-full">
  @endif
    <div class="site-wrapper">	
        <div class="hover_overlay_body"></div>
        <!-- include header PC-->
        @includeIf('client.partials.header.header_pc')

        <!-- include header SM-->
        @includeIf('client.partials.header.header_sm')
        <!-- end include header SM-->

        <!-- start include popup cart -->
        @includeIf('client.popup.cart')
        <!-- end include popup cart -->
      
        <!-- Content Wrapper. Contains page content -->
        @yield('content-client')

        <!-- include footer -->
        @includeIf('client.partials.footer')
    </div>
    <!-- .site-wrapper -->
    @stack('scripts-client')
    <!-- .site-search -->
    <script>
      jQuery(document).ready(function ($) {
        // create cart
        function createCartProduct(dataCart) {
          var dataCart = dataCart ?? [];
          return localStorage.setItem("cartProductArray", dataCart);
        }
  
        // read cart
        function readCartProduct() {
          return localStorage.getItem("cartProductArray");
        }
        
        // formart to VND
        function formatNumber(nStr, decSeperate, groupSeperate) {
          nStr += '';
          x = nStr.split(decSeperate);
          x1 = x[0];
          x2 = x.length > 1 ? '.' + x[1] : '';
          var rgx = /(\d+)(\d{3})/;
          while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
          }

          return x1 + x2 + '₫ ';
        }

        function showPopupCart() {
          // remove all item in dev and create again
          $("div.check_remove_cart").remove();
  
          if (JSON.parse(readCartProduct()) == null || JSON.parse(readCartProduct()).length == 0) {
            var totalQuantily = 0;
            var html = '<p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>';
          } else {
            var htmlLi = '';
            var totalPrice = 0;
            var totalQuantily = 0;
            $.each(JSON.parse(readCartProduct()), function (key, value) {
              totalPrice += value.quantilyProduct * value.priceProduct;
              totalQuantily = parseInt(totalQuantily) + parseInt(value.quantilyProduct);
              htmlLi += '<li class="woocommerce-mini-cart-item mini_cart_item">';
                htmlLi += '<a href="#" class="remove remove_product_from_cart_button" data-romve_id="'+ value.idProduct +'" aria-label="Remove this item">×</a>';
                htmlLi += '<a href="#">';
                  htmlLi += '<img width="330" height="413" src="'+ value.imageProduct +'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">'+ value.nameProduct +'';
                htmlLi += '</a>';
                htmlLi += '<span class="quantity">'+ value.quantilyProduct +' x ';
                  htmlLi += '<span class="woocommerce-Price-amount amount">';
                    htmlLi += '<bdi>';
                      htmlLi += '<span class="woocommerce-Price-currencySymbol"></span>'+ formatNumber(value.priceProduct, '.', ',') +'';
                    htmlLi += '</bdi>';
                  htmlLi += '</span>';
                htmlLi += '</span>';
              htmlLi += '</li>';
            });
            var html = '<div class="check_remove_cart">'
                  html += '<ul class="woocommerce-mini-cart cart_list product_list_widget ">';
                    html += htmlLi;
                  html += '</ul>';
                  html += '<p class="woocommerce-mini-cart__total total">';
                    html += '<strong>Subtotal: </strong>';
                    html += '<span class="woocommerce-Price-amount amount">';
                      html += '</ul>';
                        html += '<span class="woocommerce-Price-currencySymbol"></span>'+ formatNumber(totalPrice, '.', ',') +'';
                      html += '</bdi>';
                    html += '</span>';
                  html += '</p>';
                  html += '<p class="woocommerce-mini-cart__buttons buttons">';
                    html += '<a href="#" class="button wc-forward">View cart</a>';
                    html += '<a href="#" class="button checkout wc-forward">Checkout</a>';
                  html += '</p>';
                html += '</div>';
          }
          $('.widget_shopping_cart_content').html(html);
          $('.shopping_bag_items_number').text(totalQuantily);
        }

        function showPopupProductInCart() {
          if (JSON.parse(readCartProduct()) != null || JSON.parse(readCartProduct()).length != 0) {
            var htmlCart = '';
            var totalPrice = 0;
            var totalQuantily = 0;
            $.each(JSON.parse(readCartProduct()), function (key, value) {
              var priceProductCart = parseInt(value.quantilyProduct) * parseFloat(value.priceProduct);
              totalPrice += parseInt(value.quantilyProduct) * parseFloat(value.priceProduct);
              htmlCart += '<div class="item-popup productid-28668309">';
                htmlCart += '<div style="width: 13%;" class="border height image_ text-left">';
                  htmlCart += '<div class="item-image">';
                    htmlCart += '<a class="product-image" href="/vans-slip-on-jawbones-vn0a4bv3tbq" title="'+ value.nameProduct +' - '+ value.sizeNameProduct +'">';
                      htmlCart += '<img alt="'+ value.nameProduct +' - '+ value.sizeNameProduct +'" src="'+ value.imageProduct +'" width="90" />';
                    htmlCart += '</a>';
                  htmlCart += '</div>';
                htmlCart += '</div>';

                htmlCart += '<div style="width: 39.8%;" class="height text-left">';
                  htmlCart += '<div class="item-info">';
                    htmlCart += '<p class="item-name"><a class="text2line textlinefix" href="/vans-slip-on-jawbones-vn0a4bv3tbq" title="'+ value.nameProduct +' - '+ value.sizeNameProduct +'">'+ value.nameProduct +'</a></p>';
                    htmlCart += '<span class="variant-title-popup">'+ value.sizeNameProduct +'</span><a href="javascript:;" class="remove-item-cart" title="Xóa" data-id="28668309"><i class="fa fa-close"></i>&nbsp;&nbsp;Xoá</a>';
                  htmlCart += '</div>';
                htmlCart += '</div>';

                htmlCart += '<div style="width: 14.9%;" class="border height text-center">';
                  htmlCart += '<div class="item-price">';
                    htmlCart += '<span class="price">'+ formatNumber(value.priceProduct, '.', ',') +'</span>';
                  htmlCart += '</div>';
                htmlCart += '</div>';

                htmlCart += '<div style="width: 15.1%;" class="border height text-center">';
                  htmlCart += '<div class="qty_h check_">';
                    htmlCart += '<input class="variantID" type="hidden" name="variantId" value="28668309" />';
                    htmlCart += '<button class="num1 reduced items-count btn-minus" type="button">-</button>';
                    htmlCart += '<input type="text" maxlength="12" min="0" readonly="" class="input-text number-sidebar qtyItemP28668309" id="qtyItemP28668309" name="Lines" size="4" value="'+ value.quantilyProduct +'" />';
                    htmlCart += '<button class="num2 increase items-count btn-plus" type="button"> + </button>';
                  htmlCart += '</div>';
                htmlCart += '</div>';
                
                htmlCart += '<div style="width: 17.2%;" class="border height text-center">';
                  htmlCart += '<span class="cart-price"> <span class="price">'+ formatNumber(priceProductCart, '.', ',') +'</span> </span>';
                htmlCart += '</div>';

              htmlCart += '</div>';
            });
            

            $('.cart-popup-count').text(JSON.parse(readCartProduct()).length);
            $('.total-price').text(formatNumber(totalPrice, '.', ','));
          }

          $('.tbody-popup').html(htmlCart);
        }
  
        showPopupCart();
  
        $(document).on('click','.remove_product_from_cart_button',function(){
          var removeID = $(this).attr("data-romve_id");
          var setCartAfterRemove = JSON.parse(readCartProduct()).filter(obj => obj.idProduct != removeID);
          createCartProduct(JSON.stringify(setCartAfterRemove));
          showPopupCart();
        });

        $('.btn_add_cart').click(function(e) {
          e.preventDefault();
          var cartProductArray = readCartProduct() === null ? [] : JSON.parse(readCartProduct());

          var idProduct = $(this).attr("data-product_cart_id");
          var priceProduct = $(this).attr("data-product_cart_price");
          var nameProduct = $(this).attr("data-product_cart_name");
          var imageProduct = $(this).attr("data-product_cart_image");
          var sizeIdProduct = $('#product-selectors-size').val();
          var sizeNameProduct = $('#product-selectors-size :selected').text()
          var quantilyProduct = $('#data-product_quantity').val();

          if (Array.isArray(cartProductArray) && cartProductArray.length) {
            var findProduct = cartProductArray.findIndex((obj => obj.idProduct == idProduct));
          } else {
            var findProduct = -1;
          }
  
          if (findProduct >= 0) {
            cartProductArray[findProduct].quantilyProduct = parseInt(cartProductArray[findProduct].quantilyProduct) + parseInt(quantilyProduct);
          } else {
              cartProductArray.push({
                idProduct : idProduct,
                priceProduct : priceProduct,
                nameProduct : nameProduct,
                imageProduct : imageProduct,
                quantilyProduct : quantilyProduct,
                sizeIdProduct : sizeIdProduct,
                sizeNameProduct : sizeNameProduct
              })
          }

          $('.cart-popup-name').text(nameProduct + ' - ' + sizeNameProduct);

          createCartProduct(JSON.stringify(cartProductArray));
          showPopupProductInCart();
          showPopupCart();
  
          $(this).addClass("added")
          $(this).removeClass("loading")
          e.stopPropagation();
        });

        function showItemInCart() {
          if (JSON.parse(readCartProduct()) != null || JSON.parse(readCartProduct()).length != 0) {
            var htmlItemInCart = '';
            var totalPriceInCart = 0;
            var totalQuantilyInCart = 0;
            $.each(JSON.parse(readCartProduct()), function (key, value) {
              var priceItem = parseInt(value.quantilyProduct) * parseFloat(value.priceProduct);
              totalPriceInCart += parseInt(value.quantilyProduct) * parseFloat(value.priceProduct);
              htmlItemInCart += '<tr class="woocommerce-cart-form__cart-item cart_item" id="'+ value.idProduct +'">';
                htmlItemInCart += '<td class="product-remove">';
                  htmlItemInCart += '<a href="#" class="remove" aria-label="Remove this item" data-product_id="175" data-product_sku="">×</a>';
                htmlItemInCart += '</td>';
                htmlItemInCart += '<td class="product-thumbnail">';
                  htmlItemInCart += '<a href="#">';
                    htmlItemInCart += '<img width="330" height="413" src="'+ value.imageProduct +'" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy">';
                  htmlItemInCart += '</a>';
                htmlItemInCart += '</td>';

                htmlItemInCart += '<td class="product-name" data-title="Product">';
                  htmlItemInCart += '<a href="#">'+ value.nameProduct +' - '+ value.sizeNameProduct +'</a>';
                htmlItemInCart += '</td>';

                htmlItemInCart += '<td class="product-price" data-title="Price">';
                  htmlItemInCart += '<span class="woocommerce-Price-amount woocommerce-data-price amount" data-price="'+ value.priceProduct +'">';
                    htmlItemInCart += '<bdi>'+ formatNumber(value.priceProduct, '.', ',') +'</bdi>';
                  htmlItemInCart += '</span>';
                htmlItemInCart += '</td>';

                htmlItemInCart += '<td class="product-quantity" data-title="Quantity">';
                  htmlItemInCart += '<div class="quantity">';
                    htmlItemInCart += '<label class="screen-reader-text" for="quantity_5f605c5a4c62d">Ripped Skinny Jeans quantity</label>';
                    htmlItemInCart += '<input type="number" id="quantity_5f605c5a4c62d" class="input-text qty text" step="1" min="0" max="" name="cartQty" value="'+ value.quantilyProduct +'" title="Qty" size="4" placeholder="" inputmode="numeric">';
                  htmlItemInCart += '</div>';
                htmlItemInCart += '</td>';

                htmlItemInCart += '<td class="product-subtotal" data-title="Subtotal">';
                  htmlItemInCart += '<span class="woocommerce-Price-amount woocommerce-data-price-item amount" data-price-item="'+ priceItem +'">';
                    htmlItemInCart += '<bdi>'+ formatNumber(priceItem, '.', ',') +'</bdi>';
                  htmlItemInCart += '</span>';
                htmlItemInCart += '</td>';
            });
          }

          $('.woocommerce-price-total-cart').text(formatNumber(totalPriceInCart, '.', ','));
          $('#item-in-cart').html(htmlItemInCart);
        }

        showItemInCart();

        $(document).on('change','#quantity_5f605c5a4c62d', function() {
          if ($(this).val() == 0) {
            $(this).val(1)
          }

          var row = $(this).closest('tr');
          var dataPrice = row.find('.woocommerce-data-price').data("price") * $(this).val();
          row.find('.woocommerce-data-price-item').attr('data-price-item', dataPrice);
          row.find('.woocommerce-data-price-item').text(formatNumber(dataPrice, '.', ','));

          var totalPrice = 0;
          $('.woocommerce-data-price-item').each(function () {
            totalPrice += parseFloat($(this).closest('tr').find('.woocommerce-data-price-item').attr('data-price-item'));
          });

          var cartProductArray = readCartProduct() === null ? [] : JSON.parse(readCartProduct());
          if (Array.isArray(cartProductArray) && cartProductArray.length) {
            var findProduct = cartProductArray.findIndex((obj => obj.idProduct == row.attr('id')));
          }

          if (findProduct >= 0) {
            cartProductArray[findProduct].quantilyProduct = parseInt($(this).val());
            createCartProduct(JSON.stringify(cartProductArray));
            showPopupProductInCart();
            showPopupCart();
          }

          $('.woocommerce-price-total-cart').text(formatNumber(totalPrice, '.', ','));
        });
      });
    </script>

    <script type='text/javascript' src="{{ asset('client/wp-includes/js/imagesloaded.min55a0.js') }}"></script>
    <script type='text/javascript'>
      /* <![CDATA[ */
      var yith_wcwl_l10n = {
        "ajax_url":"\/wp-admin\/admin-ajax.php","redirect_to_cart":"no","multi_wishlist":"","hide_add_button":"1","enable_ajax_loading":"","ajax_loader_url":"https:\/\/thehanger.wp-theme.design\/wp-content\/plugins\/yith-woocommerce-wishlist\/assets\/images\/ajax-loader-alt.svg","remove_from_wishlist_after_add_to_cart":"1","is_wishlist_responsive":"1","time_to_close_prettyphoto":"3000","fragments_index_glue":".","labels":{
          "cookie_disabled":"We are sorry, but this feature is available only if cookies on your browser are enabled.","added_to_cart_message":"<div class=\"woocommerce-notices-wrapper\"><div class=\"woocommerce-message\" role=\"alert\">Product added to cart successfully<\/div><\/div>"}
        ,"actions":{
          "add_to_wishlist_action":"add_to_wishlist","remove_from_wishlist_action":"remove_from_wishlist","reload_wishlist_and_adding_elem_action":"reload_wishlist_and_adding_elem","load_mobile_action":"load_mobile","delete_item_action":"delete_item","save_title_action":"save_title","save_privacy_action":"save_privacy","load_fragments":"load_fragments"}
      };
      /* ]]> */
    </script>
    <script type='text/javascript' src="{{ asset('client/wp-content/plugins/woocommerce/assets/js/select2/select2.full.minfa0c.js') }}"></script>
    <script type='text/javascript' src="{{ asset('client/wp-content/themes/the-hanger/inc/_vendor/foundation/dist/js/foundation.min84fc.js') }}"></script>
    <script type='text/javascript' src="{{ asset('client/wp-content/themes/the-hanger/inc/_vendor/jquery-visible/jquery.visible7359.js') }}"></script>
    <script type='text/javascript' src="{{ asset('client/wp-content/themes/the-hanger/inc/_vendor/scrollTo/jquery.scrollTo.min431f.js') }}"></script>
    <script type='text/javascript' src="{{ asset('client/wp-content/themes/the-hanger/inc/_vendor/hoverIntent/jquery.hoverIntent.min8162.js') }}"></script>
    <script type='text/javascript' src="{{ asset('client/wp-content/themes/the-hanger/inc/_vendor/swiper/js/swiper4f24.js') }}"></script>
    <script type='text/javascript' src="{{ asset('client/wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min10df.js') }}"></script>
    <script type='text/javascript'>
      /* <![CDATA[ */
      var wp_js_var = {
        "select_placeholder":"Choose an option","blog_pagination_type":"infinite_scroll","shop_pagination_type":"infinite_scroll","accent_color":"#C4B583","shop_display":"grid","is_customize_preview":"","accordion_description":"","ajax_url":"https:\/\/thehanger.wp-theme.design\/wp-admin\/admin-ajax.php","woo_ajax_layered_nav_plugin":""};
      /* ]]> */
    </script>
    <script type='text/javascript' src='https://thehanger.wp-theme.design/wp-content/themes/the-hanger/js/scripts-dist.js?ver=1.6.4' id='getbowtied-scripts-js'></script>
    <script type='text/javascript' src="{{ asset('client/wp-content/plugins/js_composer/assets/lib/vc_waypoints/vc-waypoints.min10df.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/jquery.elevatezoom308.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
