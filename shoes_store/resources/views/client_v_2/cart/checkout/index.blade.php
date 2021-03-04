<html class="floating-labels">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Wear Vietnam - Thanh toán đơn hàng">
    <title>Wear Vietnam - Thanh toán đơn hàng
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://www.wear.com.vn/lib/css/select2-v4.1.0.min.css" rel="stylesheet">
    <link rel='stylesheet' id='yith-wcwl-font-awesome-css'  href="{{ asset('client/wp-content/plugins/yith-woocommerce-wishlist/assets/css/font-awesome1849.css') }}" type='text/css' media='all' />
    <link rel="stylesheet" href="https://www.wear.com.vn/css/checkout.min.css?v=39b4226">
    <script src="https://www.wear.com.vn/lib/js/jquery-1.12.4.min.js"></script>
    <script src="https://www.wear.com.vn/lib/js/select2-v4.1.0.min.js"></script>
    <script src="https://www.wear.com.vn/lib/js/turbograft.min.js"></script>
    <script src="https://www.wear.com.vn/lib/js/twine.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
  <body data-no-turbolink="">
    <header class="banner">
      <div class="wrap">
        <div class="logo logo--left ">
          <a href="/">
            <img class="logo__image  logo__image--medium " alt="Wear Vietnam" src="//bizweb.dktcdn.net/100/347/923/themes/742041/assets/logo.png?1599662978027">
          </a>
        </div>
      </div>
    </header>
    <aside>
      <button class="order-summary-toggle" data-toggle="#order-summary" data-toggle-class="order-summary--is-collapsed">
        <span class="wrap">
          <span class="order-summary-toggle__inner">
            <span class="order-summary-toggle__text">
              Đơn hàng (1 sản phẩm)
            </span>
            <span class="order-summary-toggle__btn expandable">Xem chi tiết 
            </span>
          </span>
        </span>
      </button>
    </aside>
    <div class="content" data-select2-id="select2-data-16-a16t">

      @include('client.overlay_loading.overlay_loading')
      @include('client.popup.checkout_sussess')

      <form data-tg-refresh="checkout" id="checkoutForm" method="post" action="">
        <input type="hidden" name="_method" value="patch">
        <div class="wrap">
          <main class="main">
            <header class="main__header">
              <div class="logo logo--left ">
                <a href="/">
                  <img class="logo__image  logo__image--medium " alt="Wear Vietnam" src="//bizweb.dktcdn.net/100/347/923/themes/742041/assets/logo.png?1599662978027">
                </a>
              </div>
            </header>
            <div class="main__content" data-select2-id="select2-data-14-aj24">
              <article class="animate-floating-labels row">
                <div class="col col--two">
                  <section class="section" data-select2-id="select2-data-13-e7qf">
                    <div class="section__header">
                      <div class="layout-flex">
                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                          <i class="fa fa-id-card-o fa-lg section__title--icon hide-on-desktop">
                          </i>
                          Thông tin mua và nhận hàng
                        </h2>
                        <a href="/account/login?returnUrl=/checkout/7668ef5486094386a7a26be1df9b9bbc">
                          <i class="fa fa-user-circle-o fa-lg">
                          </i>
                          <span>Đăng nhập 
                          </span>
                        </a>
                      </div>
                    </div>
                    <div class="section__content" data-select2-id="select2-data-12-fbgg">
                      <div class="fieldset">
                        <div class="field field--show-floating-label">
                          <div class="field__input-wrapper">
                            <label for="email" class="field__label field__label_email">
                              Email
                            </label>
                            <input name="email" id="email" type="email" class="field__input field__input_email" data-bind="email" value="" required>
                            <span class="text-danger-email custom-span" role="alert">
                            </span>
                          </div>
                        </div>
                        <div class="field field--show-floating-label">
                          <div class="field__input-wrapper">
                            <label for="billingName" class="field__label field__label_name">Họ và tên
                            </label>
                            <input name="billingName" id="billingName" type="text" class="field__input field__input_name" data-bind="billing.name" value="" required>
                            <span class="text-danger-name custom-span" role="alert"></span>
                          </div>
                        </div>
                        <div class="field field--show-floating-label">
                          <div class="field__input-wrapper">
                            <label for="billingPhone" class="field__label field__label_phone">
                              Số điện thoại
                            </label>
                            <input name="billingPhone" id="billingPhone" type="tel" class="field__input field__input_phone" data-bind="billing.phone" value="" required>
                            <span class="text-danger-phone custom-span" role="alert"></span>
                          </div>
                        </div>
                        <div class="field field--show-floating-label">
                          <div class="field__input-wrapper">
                            <label for="billingAddress" class="field__label field__label_address">
                              Địa chỉ
                            </label>
                            <input name="billingAddress" id="billingAddress" type="text" class="field__input field__input_address" data-bind="billing.address" value="" required>
                            <span class="text-danger-address custom-span" role="alert"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <div class="fieldset">
                    <h3 class="visually-hidden">Ghi chú
                    </h3>
                    <div class="field field--show-floating-label">
                      <div class="field__input-wrapper">
                        <label for="note" class="field__label">
                          Ghi chú (tùy chọn)
                        </label>
                        <textarea name="note" id="note" type="text" class="field__input" data-bind="note"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col col--two">
                  <section class="section">
                    <div class="section__header">
                      <div class="layout-flex">
                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                          <i class="fa fa-truck fa-lg section__title--icon hide-on-desktop">
                          </i>
                          Vận chuyển
                        </h2>
                      </div>
                    </div>
                    <div class="section__content" data-tg-refresh="refreshShipping" id="shippingMethodList">
                        <div class="alert alert--loader spinner spinner--active hide" data-bind-show="isLoadingShippingMethod">
                            <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                <use href="#spinner"></use>
                            </svg>
                        </div>

                        
                        <div class="alert alert-retry alert--danger hide" data-bind-event-click="handleShippingMethodErrorRetry()" data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; isLoadingShippingError">
                            <span data-bind="loadingShippingErrorMessage">Không thể load phí vận chuyển. Vui lòng thử lại</span> <i class="fa fa-refresh"></i>
                        </div>
                        
                        <div class="content-box" data-bind-show="!isLoadingShippingMethod &amp;&amp; !isAddressSelecting &amp;&amp; !isLoadingShippingError" data-define="{shippingMethod: '550937_0,30.000 VND'}">
                            <div class="content-box__row">
                                <div class="radio-wrapper">
                                    <div class="radio__input">
                                      <input type="radio" class="input-radio" name="shippingMethod" checked>
                                    </div>
                                    <label for="shippingMethod-550937_0" class="radio__label">
                                        <span class="radio__label__primary">SHIP COD DOUBLE BOX</span>
                                        <span class="radio__label__accessory">
                                            <span class="content-box__emphasis">
                                                30.000₫
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert--info hide" data-bind-show="!isLoadingShippingMethod &amp;&amp; isAddressSelecting">
                            Vui lòng nhập thông tin giao hàng
                        </div>
                    </div>
                  </section>
                  <section class="section">
                    <div class="section__header">
                      <div class="layout-flex">
                        <h2 class="section__title layout-flex__item layout-flex__item--stretch">
                          <i class="fa fa-credit-card fa-lg section__title--icon hide-on-desktop">
                          </i>
                          Thanh toán
                        </h2>
                      </div>
                    </div>
                    <div class="section__content">
                      <div class="content-box">
                        {{-- <div class="content-box__row">
                          <div class="radio-wrapper">
                            <div class="radio__input">
                              <input name="paymentMethod" id="paymentMethod-433014" type="radio" class="input-radio" data-bind="paymentMethod" value="433014" checked="">
                            </div>
                            <label for="paymentMethod-433014" class="radio__label">
                              <span class="radio__label__primary">Thanh toán qua VNPAY
                              </span>
                              <span class="radio__label__accessory">
                                <span class="radio__label__icon">
                                  <i class="payment-icon payment-icon--16">
                                  </i>
                                </span>
                              </span>
                            </label>
                          </div>
                        </div> --}}
                        <div class="content-box__row">
                          <div class="radio-wrapper">
                            <div class="radio__input">
                              <input name="paymentMethod" id="paymentMethod-414518" type="radio" class="input-radio" data-bind="paymentMethod" checked value="">
                            </div>
                            <label for="paymentMethod-414518" class="radio__label">
                              <span class="radio__label__primary">Thanh toán khi giao hàng (COD)
                              </span>
                              <span class="radio__label__accessory">
                                <span class="radio__label__icon">
                                  <i class="payment-icon payment-icon--4">
                                  </i>
                                </span>
                              </span>
                            </label>
                          </div>
                          <div class="content-box__row__desc hide" data-bind-show="paymentMethod == 414518">
                            <p>Bạn chỉ phải thanh toán khi nhận được hàng
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </article>
              <div class="field__input-btn-wrapper field__input-btn-wrapper--vertical hide-on-desktop">
                <button type="button" class="btn btn-checkout spinner">
                  <span class="spinner-label">ĐẶT HÀNG
                  </span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                    <use href="#spinner">
                    </use>
                  </svg>
                </button>
                <a href="/cart" class="previous-link">
                  <i class="previous-link__arrow">❮
                  </i>
                  <span class="previous-link__content">Quay về giỏ hàng
                  </span>
                </a>
              </div>
              <div id="common-alert" data-tg-refresh="refreshError">
                <div class="alert alert--danger hide-on-desktop hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại
                </div>
              </div>
            </div>
          </main>
          <aside class="sidebar">
            <div class="sidebar__header">
              <h2 class="sidebar__title">
                Đơn hàng (0 sản phẩm)
              </h2>
            </div>
            <div class="sidebar__content">
              <input hidden name="totalQuantilyInCart" id="totalQuantilyInCart" value="">
              <div id="order-summary" class="order-summary order-summary--is-collapsed">
                <div class="order-summary__sections">
                  <div class="order-summary__section order-summary__section--product-list order-summary__section--is-scrollable order-summary--collapse-element">
                    <table class="product-table">
                      <caption class="visually-hidden">Chi tiết đơn hàng
                      </caption>
                      <thead class="product-table__header">
                        <tr>
                          <th>
                            <span class="visually-hidden">Ảnh sản phẩm
                            </span>
                          </th>
                          <th>
                            <span class="visually-hidden">Mô tả
                            </span>
                          </th>
                          <th>
                            <span class="visually-hidden">Sổ lượng
                            </span>
                          </th>
                          <th>
                            <span class="visually-hidden">Đơn giá
                            </span>
                          </th>
                        </tr>
                      </thead>
                      <tbody id="product-in-cart">
                      </tbody>
                    </table>
                  </div>
                  {{-- <div class="order-summary__section order-summary__section--discount-code" id="discountCode">
                    <h3 class="visually-hidden">Mã khuyến mại
                    </h3>
                    <div class="edit_checkout animate-floating-labels">
                      <div class="fieldset">
                        <div class="field field--show-floating-label  ">
                          <div class="field__input-btn-wrapper">
                            <div class="field__input-wrapper">
                              <label for="reductionCode" class="field__label">Nhập mã giảm giá
                              </label>
                              <input name="reductionCode" id="reductionCode" type="text" class="field__input" autocomplete="off" data-bind-disabled="isLoadingReductionCode" data-bind-event-keypress="handleReductionCodeKeyPress(event)" data-define="{reductionCode: null}" data-bind="reductionCode">
                            </div>
                            <button class="field__input-btn btn spinner btn--disabled" type="button" data-bind-disabled="isLoadingReductionCode || !reductionCode" data-bind-class="{'spinner--active': isLoadingReductionCode, 'btn--disabled': !reductionCode}" data-bind-event-click="applyReductionCode()" disabled="">
                              <span class="spinner-label">Áp dụng
                              </span>
                              <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                                <use href="#spinner">
                                </use>
                              </svg>
                            </button>
                          </div>
                          <p class="field__message field__message--error field__message--error-always-show hide" data-bind-show="!isLoadingReductionCode &amp;&amp; isLoadingReductionCodeError" data-bind="loadingReductionCodeErrorMessage">Có lỗi xảy ra khi áp dụng khuyến mãi. Vui lòng thử lại
                          </p>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                  <div class="order-summary__section order-summary__section--total-lines" id="orderSummary">
                    <table class="total-line-table">
                      <caption class="visually-hidden">Tổng giá trị
                      </caption>
                      <thead>
                        <tr>
                          <td>
                            <span class="visually-hidden">Mô tả
                            </span>
                          </td>
                          <td>
                            <span class="visually-hidden">Giá tiền
                            </span>
                          </td>
                        </tr>
                      </thead>
                      <tbody class="total-line-table__tbody">
                        <tr class="total-line total-line--subtotal">
                          <th class="total-line__name">
                            Tạm tính
                          </th>
                          <td class="total-line__price total-price-temp" data-pice-temp="">0₫
                          </td>
                        </tr>
                        <tr class="total-line total-line--shipping-fee">
                          <th class="total-line__name">
                            Phí vận chuyển
                          </th>
                          <td class="total-line__price price-ship">
                          </td>
                        </tr>
                      </tbody>
                      <tfoot class="total-line-table__footer">
                        <tr class="total-line payment-due">
                          <th class="total-line__name">
                            <span class="payment-due__label-total">
                              Tổng cộng
                            </span>
                          </th>
                          <td class="total-line__price">
                            <span class="payment-due__price">0₫
                            </span>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="order-summary__nav field__input-btn-wrapper hide-on-mobile">
                    <a href="#" class="previous-link">
                      <i class="previous-link__arrow">❮
                      </i>
                      <span class="previous-link__content">Quay về giỏ hàng
                      </span>
                    </a>
                    <button type="button" class="btn btn-checkout spinner">
                      <span class="spinner-label">ĐẶT HÀNG
                      </span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="spinner-loader">
                        <use href="#spinner">
                        </use>
                      </svg>
                    </button>
                  </div>
                  <div id="common-alert-sidebar" data-tg-refresh="refreshError">
                    <div class="alert alert--danger hide-on-mobile hide" data-bind-show="!isSubmitingCheckout &amp;&amp; isSubmitingCheckoutError" data-bind="submitingCheckoutErrorMessage">Có lỗi xảy ra khi xử lý. Vui lòng thử lại
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </form>
    </div>
    <script>
      jQuery(document).ready(function ($) {
      //   $('button').click(function(){
      //     $('.pop-up').addClass('open');
      //   });

      // $('.pop-up .close').click(function(){
      //   $('.pop-up').removeClass('open');
      // });
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

        function showItemInProcessCheckout ()
        {
          var htmlItemInCart = '';
          if (JSON.parse(readCartProduct()) != null || JSON.parse(readCartProduct()).length != 0) {
            var totalPriceInCart = 0;
            var totalQuantilyInCart = 0;
            $.each(JSON.parse(readCartProduct()), function (key, value) {
              var priceItem = parseInt(value.quantilyProduct) * parseFloat(value.priceProduct);
              totalPriceInCart += parseInt(value.quantilyProduct) * parseFloat(value.priceProduct);
              totalQuantilyInCart += parseInt(value.quantilyProduct);
              htmlItemInCart += '<tr class="product">';
                htmlItemInCart += '<td class="product__image">';
                  htmlItemInCart += '<div class="product-thumbnail">';
                      htmlItemInCart += '<div class="product-thumbnail__wrapper" data-tg-static="">';
                          htmlItemInCart += '<img src="'+ value.imageProduct +'" alt="" class="product-thumbnail__image">';
                      htmlItemInCart += '</div>';
                      htmlItemInCart += '<span class="product-thumbnail__quantity">'+ value.quantilyProduct +'</span>';
                  htmlItemInCart += '</div>';
                htmlItemInCart += '</td>';
                htmlItemInCart += '<th class="product__description">';
                  htmlItemInCart += '<span class="product__description__name">'+ value.nameProduct +'</span>';
                  htmlItemInCart += '<span class="product__description__property">'+ value.sizeNameProduct +'</span>';
                htmlItemInCart += '</th>';

                htmlItemInCart += '<td class="product__quantity visually-hidden">';
                  htmlItemInCart += '<em>Số lượng: </em> '+ value.quantilyProduct;
                htmlItemInCart += '</th>';

                htmlItemInCart += '<td class="product__price"> '+ formatNumber(priceItem, '.', ','); +' </td>';
              htmlItemInCart += '</tr>';
            });
            $('.sidebar__title').text('Đơn hàng ('+ JSON.parse(readCartProduct()).length +' sản phẩm)');
          }
          $('#product-in-cart').html(htmlItemInCart);
          $('.total-price-temp').text(formatNumber(totalPriceInCart, '.', ','));
          $('.price-ship').text(formatNumber(30000, '.', ','));
          $('.total-price-temp').attr('data-price-temp', totalPriceInCart);
          $('.payment-due__price').text(formatNumber(30000 + totalPriceInCart, '.', ','));
          $('#totalQuantilyInCart').val(totalQuantilyInCart);
        }
        
        showItemInProcessCheckout();

        // call function error
        function callError(message)
        {
          swal(message, {
            icon: "error",
            buttons: false,
            timer: 3000,
            dangerMode: true,
          });
        }

        // call function Success
        function callSuccess(message)
        {
          swal(message, {
            icon: "success",
            buttons: false,
            timer: 3000,
            dangerMode: true,
          });
        }

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        // validate email
        function validateEmail(email)
        {
          const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
        }

        function validatePhone(phone)
        {
          const isVNPhoneMobile = /^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/;

          return isVNPhoneMobile.test(phone);
        }

        function errorEmail(messageEmail)
        {
          $('.text-danger-email').text(messageEmail);
          $('.text-danger-email').addClass('text-danger');
          $('.field__label_email').addClass('text-danger');
          $('.field__input_email').addClass('text-danger');
        }

        function errorName(messageName)
        {
          $('.text-danger-name').text(messageName);
          $('.text-danger-name').addClass('text-danger');
          $('.field__label_name').addClass('text-danger');
          $('.field__input_name').addClass('text-danger');
        }

        function errorPhone(messagePhone)
        {
          $('.text-danger-phone').text(messagePhone);
          $('.text-danger-phone').addClass('text-danger');
          $('.field__label_phone').addClass('text-danger');
          $('.field__input_phone').addClass('text-danger');
        }

        function errorAddress(messageAddress)
        {
          $('.text-danger-address').text(messageAddress);
          $('.text-danger-address').addClass('text-danger');
          $('.field__label_address').addClass('text-danger');
          $('.field__input_address').addClass('text-danger');
        }

        function validateData()
        {
          var email = $('#email').val();
          var billingName = $('#billingName').val();
          var billingPhone = $('#billingPhone').val();
          var billingAddress = $('#billingAddress').val();
          var check = true;

          // validate email
          if (email == '') {
            errorEmail('Vui lòng nhập email !!!');
            check = false;
          } else {
            if (!validateEmail(email)) {
              errorEmail('Vui lòng nhập đúng email !!!');
              check = false;
            }
          }

          // validate name
          if (billingName == '') {
            errorName('Vui lòng nhập họ và tên !!!');
            check = false;
          } else {
            if (billingName.length > 50) {
              errorName('Họ và tên phải dưới 50 kí tự !!!');
              check = false;
            }
          }

          // validate phone
          if (billingPhone == '') {
            errorPhone('Vui lòng nhập số điện thoại !!!');
            check = false;
          } else {
            if (!validatePhone(billingPhone)) {
              errorPhone('Vui lòng nhập đúng số điện thoại');
              check = false;
            }
          }

          // validate address
          if (billingAddress == '') {
            errorAddress('Vui lòng nhập địa chỉ !!!');
            check = false;
          } else {
            if (billingAddress > 255) {
              errorAddress('Họ và tên phải dưới 255 kí tự!!!');
              check = false;
            }
          }

          return check;
        }

        function clearDataAfterCheckout()
        {
          localStorage.removeItem("cartProductArray");
          $('#email').val(''),
          $('#billingName').val(''),
          $('#billingPhone').val(''),
          $('#billingAddress').val(''),
          $('#totalQuantilyInCart').val(''),
          $('#note').val('')
        }

        $('.btn-checkout').click(function(e) {
          console.log(validateData());
          if (validateData() == true) {
            e.preventDefault();
            $.ajax({
              url: '{{ route('checkout_create') }}',
              method: 'post',
              data: {
                email: $('#email').val(),
                billingName: $('#billingName').val(),
                billingPhone: $('#billingPhone').val(),
                billingAddress: $('#billingAddress').val(),
                totalQuantilyInCart: $('#totalQuantilyInCart').val(),
                note: $('#note').val(),
                orderDetail: JSON.parse(readCartProduct())
              },
              beforeSend: function(){
                $('#overlay').show();
              },
              success: function(res) {
                if (res.success === false) {
                  callError(res.message);
                  $('#overlay').hide();
                } else {
                  $('#overlay').hide();
                  $('.pop-up').addClass('open');
                  // clearDataAfterCheckout();
                  showItemInProcessCheckout();
                }
              },
              error: function() {
                callError('Something wrong, please try again!');
                $('#overlay').hide();
              }
            });
          }
        });
      });
    </script>
  </body>
</html>
