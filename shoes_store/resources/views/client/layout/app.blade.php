<!DOCTYPE html>
<html lang="en-US" class="no-js">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <head>
    <meta charset="UTF-8">
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
  </head>

  @if (url()->current() == config('app.url'))
    <body class="home page-template-default page page-id-572 page-child parent-pageid-564 wp-embed-responsive theme-the-hanger woocommerce-js wpb-js-composer js-comp-ver-6.2.0 vc_responsive site-main-font header-layout-full content-layout-full page-without-title footer-layout-full">
  @elseif (Route::currentRouteName() === 'product_detail')
    <body class="product-template-default single single-product postid-248 wp-embed-responsive theme-the-hanger woocommerce woocommerce-page woocommerce-js wpb-js-composer js-comp-ver-6.3.0 vc_responsive site-main-font header-layout-full content-layout-full  footer-layout-full">
  @else
    <body class="archive tax-product_cat term-jackets-coats term-45 wp-embed-responsive theme-the-hanger woocommerce woocommerce-page woocommerce-js wpb-js-composer js-comp-ver-6.2.0 vc_responsive site-main-font header-layout-full content-layout-full  woocommerce-shop shop-pagination-infinite_scroll shop-sidebar-active shop-sidebar-left blog-pagination-infinite_scroll footer-layout-full">
  @endif
    <div class="site-wrapper">	
        <div class="hover_overlay_body"></div>
        <!-- include header PC-->
        @includeIf('client.partials.header.header_pc')

        <!-- include header SM-->
        @includeIf('client.partials.header.header_sm')
      
        <!-- Content Wrapper. Contains page content -->
        @yield('content-client')

        <!-- include footer -->
        @includeIf('client.partials.footer')
    </div>
    <!-- .site-wrapper -->
    @stack('scripts-client')
    <!-- .site-search -->

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
