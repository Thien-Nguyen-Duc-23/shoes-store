@extends('client_v_2.layout.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" type="text/javascript">
    </script>
@endpush
@section('content-client')
  <!-- include bread_crumb -->
  @includeIf('client_v_2.product.bread_crumb.index')
  <!-- end include bread_crumb -->

  @if (!empty($productDetailBySlug))
    <section class="product">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 details-product">
            <div class="row">
              <!-- include content image -->
              @includeIf('client_v_2.product.content.image')
              <!-- end include content image -->

              <!-- include content detail -->
              @includeIf('client_v_2.product.content.detail')
              <!-- end include content detail -->
            </div>
          </div>

          <!-- include content tab -->
          @includeIf('client_v_2.product.content.tab')
          <!-- end include content tab -->

          <!-- include related_product -->
          @includeIf('client_v_2.product.related_product.index')
          <!-- end include related_product -->
        </div>
      </div>
    </section>
  @endif

  <div class="product-recommend-module-box" style="display: none;">
    <style>
      #owl-product-recommend .item {
        margin: 3px;
      }
      #owl-product-recommend .item img {
        display: block;
        width: 50%;
        height: auto;
        margin: 0 auto;
      }
    </style>
    <link href="https://productsrecommend.sapoapps.vn/Content/styles/css/frontend/module-style.css" rel="stylesheet" />
    <div class="product-recommend-module-title">
    </div>
    <div id="owl-product-recommend" class="">
    </div>
    {{-- <script>
      var BizwebProductRecommendApp = BizwebProductRecommendApp || {
      };
      BizwebProductRecommendApp.productId = "19394074";
    </script> --}}
  </div>
@endsection
@push('scripts')
  <script>
    $(document).ready(function() {
        if($(window).width()>1200) {
            setTimeout(function() {
                $('#zoom_01').elevateZoom({
                    gallery:'gallery_01',
                    zoomWindowWidth:420,
                    zoomWindowHeight:500,
                    zoomWindowOffetx: 10,
                    easing : true,
                    scrollZoom : false,
                    cursor: 'pointer',
                    galleryActiveClass: 'active',
                    imageCrossfade: true
                });
            }, 500);
        }
    });

    $(window).on("load resize",function(e) {
      if($(window).width() > 1199) {
        var he = $('.large-image').height();

        if (he > 500) {
          he = he - 200;
          $('#gallery_01').css('margin-top','100px');
          $('.product-image-block').removeClass('margin');
        } else {
          $('.product-image-block').addClass('margin');
          $('#gallery_01').css('margin-top','0');
        }

        $('#gallery_01').height(he);
        if (he < 250) {
          var items = 2;
        } else {
            if (he < 400) {
              var items = 4;
            } else {
              if (he > 750) {
                  var items = 9;
              } else {
                if (he > 600) {
                  var items = 6;
                } else {
                  var items = 4;
                }
              }
            }
        }

        $("#gallery_01.swiper-container").each(function() {
          var config = {
            spaceBetween: 15,
            slidesPerView: items,
            direction: $(this).data('direction'),
            paginationClickable: true,
            nextButton: '.swiper-button-next.fixlg',
            prevButton: '.swiper-button-prev.fixlg',
            grabCursor: true ,
            calculateHeight:true,
            height:he
          };
          var swiper = new Swiper(this, config);
        });
        
        $('.more-views .swiper-slide img').each(function(e) {
          var t1 = (this.naturalHeight/this.naturalWidth);
          if (t1<1) {
            $(this).parents('.swiper-slide').addClass('bethua');
          }
        })
      } else {
        $("#gallery_01.swiper-container").each( function() {
          var config = {
            spaceBetween: 15,
            slidesPerView: 4,
            direction: 'horizontal',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            grabCursor: true ,
            calculateHeight:true,
          };
          var swiper = new Swiper(this, config);
        });
      }
      $('.thumb-link').click(function(e) {
        e.preventDefault();
        var hr = $(this).attr('href');
        $('#zoom_01').attr('src',hr);
      })
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
@endpush
