<!DOCTYPE html>
<html lang="vi">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">			
    <title>
      Homies SG
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ================= Page description ================== -->
    <meta name="description" content="Homies SG - STORE CHUYÊN SỈ THỜI TRANG UNISEX. 
                                      Địa chỉ : 110 Đường 8, P.Linh Xuân, Quận Thủ Đức, TP.HCM. 
                                      SĐT : 0903 169 942
                                      Instagtam : homies.saigon. 
                                      Shopee : shopee.vn/homies.saigon">
    <!-- ================= Meta ================== -->
    <meta name="keywords" content="Homies SG, homiessg.vn"/>		
    <link rel="canonical" href="index.html"/>
    <meta name='revisit-after' content='1 days' />
    <meta name="robots" content="noodp,index,follow" />
    <!-- ================= Favicon ================== -->
    <link rel="icon" href="http://bizweb.dktcdn.net/100/345/647/themes/710110/assets/favicon.png?1593244016703" type="image/x-icon" />
    <!-- ================= Google Fonts ================== -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto+Slab:400,700&amp;subset=vietnamese" rel="stylesheet">
    <!-- Plugin CSS -->	
    <link rel="stylesheet" href="//cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" >
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css"> --}}
    <link href="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/owl.carousel.min.css?1593244016703" rel="stylesheet" type="text/css" />
    <!-- Build Main CSS -->								
    <link href="http://bizweb.dktcdn.net/100/345/647/themes/710110/assets/base.scss.css?1593244016703" rel="stylesheet" type="text/css" />		
    <link href="http://bizweb.dktcdn.net/100/345/647/themes/710110/assets/style.scss.css?1593244016703" rel="stylesheet" type="text/css" />		
    <link href="http://bizweb.dktcdn.net/100/345/647/themes/710110/assets/module.scss.css?1593244016703" rel="stylesheet" type="text/css" />
    <link href="http://bizweb.dktcdn.net/100/345/647/themes/710110/assets/responsive.scss.css?1593244016703" rel="stylesheet" type="text/css" />
    <!-- Header JS -->	
    <script src="http://bizweb.dktcdn.net/100/345/647/themes/710110/assets/jquery-2.2.3.min.js?1593244016703" type="text/javascript">
    </script>
    <!-- Bizweb javascript customer -->

    <noscript>
      <img height='1' width='1' style='display:none' src='https://www.facebook.com/tr?id=759982964743684&amp;ev=PageView&amp;noscript=1' />
    </noscript>
    <!--DO NOT MODIFY-->
    <!--End Facebook Pixel Code-->

    <link href="http://bizweb.dktcdn.net/100/345/647/themes/710110/assets/appbulk-product-statistics.css?1593244016703" rel="stylesheet" type="text/css" />
    <!-- Facebook Pixel Code -->

    <noscript>
      <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=955764381212476&amp;ev=PageView&amp;noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Stack style -->
    @stack('styles')
    <!-- End Stack style -->
  </head>
  <body>
    <div class="hidden-md hidden-lg opacity_menu">
    </div>
    <div class="opacity_filter">
    </div>
    <!-- Main content -->
    <!-- Menu mobile -->
    @includeIf('client_v_2.layout.header.header_sm')
    <!-- End -->

    <!-- include header -->
    @includeIf('client_v_2.layout.header.header_pc')
    <!-- end include header -->

    <!-- Content Wrapper. Contains page content -->
    @yield('content-client')
    <!-- End Content Wrapper. Contains page content -->

    <div class="pr-module-box" style="display: none">
      <div class="pr-module-title">
      </div>
      <div class="pr-slide-wrap">
        <ul class="pr-list-product-slide">
        </ul>
      </div>
      <div class="pr-slide">
      </div>
    </div>
    <script>
      window.productRecentVariantId = [];
      window.productRecentId = "";
    </script>
    <link href="https://productviewedhistory.sapoapps.vn//Content/styles/css/ProductRecentStyle.css" rel="stylesheet" />
    <div class="ab-most-view-product-module ab-hide">
    </div>
    <link href="http://bizweb.dktcdn.net/100/345/647/themes/710110/assets/bpr-products-module.css?1593244016703" rel="stylesheet" type="text/css" />
    <div class="bizweb-product-reviews-module">
    </div> 

    <!-- include footer -->
    @includeIf('client_v_2.layout.footer.index')
    <!-- end include footer -->

    <!-- Stack style -->
    @stack('scripts')
    <!-- End Stack style -->

    <!-- Bizweb javascript -->
    <script src="http://bizweb.dktcdn.net/100/345/647/themes/710110/assets/option-selectors.js?1593244016703" type="text/javascript">
    </script>
    <script src="http://bizweb.dktcdn.net/assets/themes_support/api.jquery.js" type="text/javascript">
    </script> 
    <!-- Plugin JS -->
    <script src="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/owl.carousel.min.js?1593244016703" type="text/javascript">
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.jquery.min.js">
    </script> --}}
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <!-- Add to cart -->	
    <div class="ajax-load"> 
      <span class="loading-icon">
        <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
          <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
          </rect>
          <rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
          </rect>
          <rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
          </rect>
        </svg>
      </span>
    </div>
    <div class="loading awe-popup">
      <div class="overlay">
      </div>
      <div class="loader" title="2">
        <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
          <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
          </rect>
          <rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
          </rect>
          <rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">
            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
          </rect>
        </svg>
      </div>
    </div>
    <div class="addcart-popup product-popup awe-popup">
      <div class="overlay no-background">
      </div>
      <div class="content">
        <div class="row row-noGutter">
          <div class="col-xl-6 col-xs-12">
            <div class="btn btn-full btn-primary a-left popup-title">
              <i class="fa fa-check">
              </i>Thêm vào giỏ hàng thành công
            </div>
            <a href="javascript:void(0)" class="close-window close-popup">
              <i class="fa fa-close">
              </i>
            </a>
            <div class="info clearfix">
              <div class="product-image margin-top-5">
                <img alt="popup" src="http://bizweb.dktcdn.net/100/345/647/themes/710110/assets/logo.png?1593244016703" style="max-width:150px; height:auto"/>
              </div>
              <div class="product-info">
                <p class="product-name">
                </p>
                <p class="quantity color-main">
                  <span>Số lượng: 
                  </span>
                </p>
                <p class="total-money color-main">
                  <span>Tổng tiền: 
                  </span>
                </p>
              </div>
              <div class="actions">    
                <button class="btn  btn-primary  margin-top-5 btn-continue">Tiếp tục mua hàng
                </button>        
                <button class="btn btn-gray margin-top-5" onclick="window.location='cart.html'">Kiểm tra giỏ hàng
                </button>
              </div> 
            </div>
          </div>			
        </div>
      </div>    
    </div>
    <div class="error-popup awe-popup">
      <div class="overlay no-background">
      </div>
      <div class="popup-inner content">
        <div class="error-message"></div>
      </div>
    </div>

    <!-- start include popup cart -->
    @includeIf('client_v_2.layout.popup.cart')
    <!-- end include popup cart -->

    <div id="myModal" class="modal fade" role="dialog"></div>

    <script src="{{ asset('js/main_client.js') }}" type="text/javascript"></script>
    <script src="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/cs.script.js?1593244016703" type="text/javascript">
    </script>
    <script src="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/appear.js?1593244016703" type="text/javascript">
    </script>
    <script src="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/double_tab_togo.js?1593244016703" type="text/javascript">
    </script>
    <!-- Main JS -->	
    <script src="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/sticky.js?1593244016703" type="text/javascript">
    </script>
    <script src="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/main.js?1593244016703" type="text/javascript">
    </script>
    <!-- Product detail JS,CSS -->
    <link href="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/lightbox.css?1593244016703" rel="stylesheet" type="text/css" />
    <script src="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/jquery.elevatezoom308.min.js?1593244016703" type="text/javascript">
    </script>		
    <script src="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/jquery.prettyphoto.min005e.js?1593244016703" type="text/javascript">
    </script>
    <script src="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/jquery.prettyphoto.init.min367a.js?1593244016703" type="text/javascript">
    </script>
    <script src="//bizweb.dktcdn.net/100/345/647/themes/710110/assets/appbulk-product-statistics.js?1593244016703" type="text/javascript">
    </script>
  </body>
  <!-- Mirrored from homiessg.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Oct 2020 08:53:33 GMT -->
</html>
