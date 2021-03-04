$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend: function () {
      $("#overlay").show();
    },
    complete: function () {
      $("#overlay").hide();
    }
  });
  var user = {id: 1, idProduct: "20", priceProduct: "540000", nameProduct: "shoes test detail"};
  sessionStorage.setItem('user', JSON.stringify(user));

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
    if (JSON.parse(readCartProduct()) != null || JSON.parse(readCartProduct()).length != 0) {
      var htmlCart = '';
      var totalPrice = 0;

      $.each(JSON.parse(readCartProduct()), function (key, value) {
        totalPrice += parseInt(value.quantilyProduct) * parseFloat(value.priceProduct);
        htmlCart += '<div class="item-popup productid-'+ key +'">';
          htmlCart += '<div style="width: 55%;" class="text-left">';
            htmlCart += '<div class="item-image">';
              htmlCart += '<a class="product-image" href="'+ value.url +'" title="'+ value.nameProduct +' - '+ value.sizeNameProduct +' - '+ value.colorNameProduct +'">';
                htmlCart += '<img alt="'+ value.nameProduct +' - '+ value.sizeNameProduct +' - '+ value.colorNameProduct +'" src="'+ value.imageProduct +'" width="90" />';
              htmlCart += '</a>';
              htmlCart += '<p class="item-remove">';
                htmlCart += '<a class="remove-item-cart remove-item-cart-popup" title="Xóa" data-romve_id="'+ key +'">';
                  htmlCart += '<i class="fa fa-times-circle"></i> Xóa';
                htmlCart += '</a>';
              htmlCart += '</p>';
            htmlCart += '</div>';
            htmlCart += '<div class="item-info">';
              htmlCart += '<p class="item-name">';
                htmlCart += '<a href="'+ value.url +'" title="'+ value.nameProduct +' - '+ value.sizeNameProduct +'">'+ value.nameProduct +'</a>';
              htmlCart += '</p>';
              htmlCart += '<p class="variant-tit">'+  value.sizeNameProduct +'/'+ value.colorNameProduct +'</p>';
            htmlCart += '</div>';
          htmlCart += '</div>';

          htmlCart += '<div style="width: 45%;" class="text-right">';
            htmlCart += '<div class="item-price">';
              htmlCart += '<span class="price">'+ formatNumber(value.priceProduct, '.', ',') +'</span>';
            htmlCart += '</div>';

            htmlCart += '<div class="fixab">';
              htmlCart += '<input type="text"class="input-text number-sidebar qtyItem39014707" value="'+ value.quantilyProduct +'" disabled=""';
            htmlCart += '</div>';
          htmlCart += '</div>';
        htmlCart += '</div>';
        htmlCart += '</div>';
      });
      
      $('.total-price').text(formatNumber(totalPrice, '.', ','));
      $('.tbody-popup').html(htmlCart);
    }

    $('#popup-cart').modal('show');
    miniCart();
  }

  $(document).on('click','.remove-item-cart-popup',function(){
    var removeID = $(this).attr("data-romve_id");
    var setCartAfterRemove = JSON.parse(readCartProduct()).splice(removeID, 1);
    createCartProduct(JSON.stringify(setCartAfterRemove));
    showPopupCart();
  });

  $('.btn_add_to_cart').click(function(e) {
    e.preventDefault();

    var cartProductArray = readCartProduct() === null ? [] : JSON.parse(readCartProduct());
    var idProduct = $(this).attr("data-product_cart_id");
    var priceProduct = $(this).attr("data-product_cart_price");
    var nameProduct = $(this).attr("data-product_cart_name");
    var imageProduct = $(this).attr("data-product_cart_image");
    var sizeIdProduct = $("input[name='option-size']:checked").val();
    var sizeNameProduct = $("input[name='option-size']:checked").attr("data-size");
    var colorIDProduct = $("input[name='option-color']:checked").val();
    var colorNameProduct = $("input[name='option-color']:checked").attr("data-color");
    var quantilyProduct = $('#qty').val();

    if (Array.isArray(cartProductArray) && cartProductArray.length) {
      var findProduct = cartProductArray.findIndex((obj => obj.idProduct == idProduct && obj.sizeIdProduct == sizeIdProduct && obj.colorIDProduct == colorIDProduct));
    } else {
      var findProduct = -1;
    }

    if (findProduct >= 0) {
      cartProductArray[findProduct].quantilyProduct = parseInt(cartProductArray[findProduct].quantilyProduct) + parseInt(quantilyProduct);
    } else {
      cartProductArray.push({
        id: cartProductArray.length + 1,
        idProduct: idProduct,
        priceProduct: priceProduct,
        nameProduct: nameProduct,
        imageProduct: imageProduct,
        quantilyProduct: quantilyProduct,
        sizeIdProduct: sizeIdProduct,
        sizeNameProduct: sizeNameProduct,
        colorIDProduct: colorIDProduct,
        colorNameProduct: colorNameProduct,
        url: window.location.href
      })
    }

    createCartProduct(JSON.stringify(cartProductArray));
    
    
    let title = '<a href="'+ window.location.href +'">'+ nameProduct +' - '+ colorNameProduct +  '/'+ sizeNameProduct +'</a>';
    $('.cart-popup-name').html(title);

    showPopupCart();

    // chuwa dung
    // showPopupProductInCart();
    // showPopupCart();

    // $(this).addClass("added")
    // $(this).removeClass("loading")
    // e.stopPropagation();
  });

  $(document).on('click','.remove-item-mini-cart',function() {
    var removeID = $(this).attr("data-romve-mini-id");
    removeItemInCart(removeID);
    miniCart();
    readCartIndex();
  });

  function removeItemInCart(id) {
    var setCartAfterRemove = JSON.parse(readCartProduct()).filter(item => item.id != id);
    createCartProduct(JSON.stringify(setCartAfterRemove));
  }

  $(document).on('click','.remove-item-cart-index',function() {
    var removeID = $(this).attr("data-romve_id");
    removeItemInCart(removeID);
    readCartIndex();
    miniCart();
  });

  miniCart();

  function miniCart() {
    var htmlMiniCart = '';
    if (JSON.parse(readCartProduct()) != null && JSON.parse(readCartProduct()).length != 0) {
      var totalPrice = 0;
      htmlMiniCart += '<ul class="list-item-cart list-item-cart-mini">';
      $.each(JSON.parse(readCartProduct()), function (key, value) {
        totalPrice += parseInt(value.quantilyProduct) * parseFloat(value.priceProduct);
        htmlMiniCart += '<li class="item productid-'+ value.id +'">';
          htmlMiniCart += '<div class="border_list">';
            htmlMiniCart += '<a class="product-image" href="'+ value.url +'" title="'+ value.nameProduct +' - '+ value.sizeNameProduct +' - '+ value.colorNameProduct +'">';
              htmlMiniCart += '<img alt="'+ value.nameProduct +' - '+ value.sizeNameProduct +' - '+ value.colorNameProduct +'" src="'+ value.imageProduct +'" width="100">';
            htmlMiniCart += '</a>';

            htmlMiniCart += '<div class="detail-item">';
              htmlMiniCart += '<div class="product-details">';
                htmlMiniCart += '<p class="product-name">';
                  htmlMiniCart += '<a href="'+ value.url +'" title="'+ value.nameProduct +' - '+ value.sizeNameProduct +' - '+ value.colorNameProduct +'">'+ value.nameProduct +' '+ value.sizeNameProduct +' - '+ value.colorNameProduct +'</a>';
                htmlMiniCart += '</p>';
              htmlMiniCart += '</div>';

              htmlMiniCart += '<div class="product-details-bottom">';
                htmlMiniCart += '<span class="price">'+ formatNumber(value.priceProduct, '.', ',') +'</span>';
                htmlMiniCart += '<a data-romve-mini-id="'+ value.id +'" title="Xóa" class="remove-item-mini-cart fa fa-times">&nbsp;</a>';
                htmlMiniCart += '<div class="quantity-select qty_drop_cart">';
                  htmlMiniCart += '<input class="variantID" type="hidden" name="variantId" value="'+ value.quantilyProduct +'">';
                  // htmlMiniCart += '<button disabled="" type="button">–</button>';
                  htmlMiniCart += '<input type="text" maxlength="12" min="0" class="input-text number-sidebar qty39142296" id="qty39142296" name="Lines" size="4" value="'+ value.quantilyProduct +'">';
                  // htmlMiniCart += '<button class="btn_increase increase num2x items-count btn-pluss" type="button">+</button>';
                htmlMiniCart += '</div>';
              htmlMiniCart += '</div>';
            htmlMiniCart += '</div>';
          htmlMiniCart += '</div>';
        htmlMiniCart += '</li>';
      });
      htmlMiniCart += '</ul>';
      htmlMiniCart += '<div class="pd">';
        htmlMiniCart += '<div class="top-subtotal">Tổng tiền: ';
          htmlMiniCart += '<span class="price price-mini">'+ formatNumber(totalPrice, '.', ',') +'</span>';
        htmlMiniCart += '</div>';
      htmlMiniCart += '</div>';
      htmlMiniCart += '<div class="pd right_ct">';
        htmlMiniCart += '<a href="/checkout" class="btn btn-checkout btn-primary">';
          htmlMiniCart += '<span>Thanh toán</span>';
        htmlMiniCart += '</a>';
      htmlMiniCart += '</div>';
      
      $('.count_item_pr').text(JSON.parse(readCartProduct()).length);
    } else {
      htmlMiniCart += '<ul class="list-item-cart list-item-cart-mini">';
        htmlMiniCart += '<div class="no-item"><p>Không có sản phẩm nào trong giỏ hàng.</p></div>';
      htmlMiniCart += '</div>';
      
      $('.count_item_pr').text(0);
    }

    $('.mini-products-list').html(htmlMiniCart);
  }
  
  readCartIndex();

  function readCartIndex() {
    var htmlCartIndex = '';
    var totalPrice = 0;
    if (JSON.parse(readCartProduct()) != null && JSON.parse(readCartProduct()).length != 0) {
      htmlCartIndex += '<div class="col-main cart_desktop_page cart-page hidden-xs">';
        htmlCartIndex += '<div class="cart page_cart cart_des_page hidden-xs-down row">';
          htmlCartIndex += '<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 cart_desktop ">';
            // htmlCartIndex += '<form action="/cart" method="post" novalidate="">';
              htmlCartIndex += '<div class="bg-scroll">';
                htmlCartIndex += '<div class="cart-thead">';
                  htmlCartIndex += '<div class="text-left" style="width: 45%">';
                    htmlCartIndex += '<p>Thông tin sản phẩm</p><p></p>';
                  htmlCartIndex += '</div>';
                htmlCartIndex += '</div>';
                htmlCartIndex += '<div class="cart-tbody cart-tbody-PC">';
                htmlCartIndex += '</div>';
              htmlCartIndex += '</div>';
            // htmlCartIndex += '</form>';
          htmlCartIndex += '</div>';
          htmlCartIndex += '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 cart-collaterals cart_submit">';
            htmlCartIndex += '<div class="totals">';
              htmlCartIndex += '<div class="inner">';
                htmlCartIndex += '<div class="shopping-cart-table-total" id="shopping-cart-totals-table">';
                  htmlCartIndex += '<span class="total-pag-cart">Tổng tiền</span>';
                  htmlCartIndex += '<p class="totals_price price totals_price-PC"></p>';
                  htmlCartIndex += '<span class="tax">Không bao gồm thuế và phí vận chuyển</span>';
                htmlCartIndex += '</div>';
                htmlCartIndex += '<p class="text-order">Đơn đặt hàng sẽ được xử lý bằng VNĐ.</p>';
                htmlCartIndex += '<a class="button btn-proceed-checkout" title="Thanh toán" type="button">';
                  htmlCartIndex += '<span>Thanh toán</span>';
                htmlCartIndex += '</a>';
              htmlCartIndex += '</div>';
            htmlCartIndex += '</div>';
          htmlCartIndex += '</div>';
        htmlCartIndex += '</div>';
      htmlCartIndex += '</div>';
      
      htmlCartIndex += '<div class="cart_mobile_page hidden-lg hidden-md hidden-sm">';
        htmlCartIndex += '<div class="cart_mb cart_ct_mobile">';
          htmlCartIndex += '<div class="cart_mobile_content">';
            // htmlCartIndex += '<form action="/cart" method="post" novalidate=""></form>';
            htmlCartIndex += '<div class="body-item body-item-SP">';
            htmlCartIndex += '</div>';
          htmlCartIndex += '</div>';
          htmlCartIndex += '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 cart-collaterals cart_submit">';
            htmlCartIndex += '<div class="totals">';
              htmlCartIndex += '<div class="inner">';
                htmlCartIndex += '<div class="shopping-cart-table-total" id="shopping-cart-totals-table">';
                  htmlCartIndex += '<span>Tổng tiền</span>';
                  htmlCartIndex += '<p class="totals_price price totals_price-SP"></p>';
                htmlCartIndex += '</div>';
                htmlCartIndex += '<a class="button btn-proceed-checkout" title="Thanh toán" type="button">';
                  htmlCartIndex += '<span>Thanh toán</span>';
                htmlCartIndex += '</a>';
              htmlCartIndex += '</div>';
            htmlCartIndex += '</div>';
          htmlCartIndex += '</div>';
        htmlCartIndex += '</div>';
      htmlCartIndex += '</div>';

      $('.main-cart-index').html(htmlCartIndex);

      var htmlPC, htmlSP = '';
      $.each(JSON.parse(readCartProduct()), function (key, value) {
        totalPrice += parseInt(value.quantilyProduct) * parseFloat(value.priceProduct);
        htmlPC += '<div class="item-cart productid-'+ value.id +'">';
          htmlPC += '<div style="width: 17%" class="image border-right-none">';
            htmlPC += '<a class="product-image" title="'+ value.nameProduct +' - '+ value.sizeNameProduct +' - '+ value.colorNameProduct +'">';
              htmlPC += '<img width="75" height="auto" alt="title="'+ value.nameProduct +' - '+ value.sizeNameProduct +' - '+ value.colorNameProduct +'"" src="'+ value.imageProduct +'">';
            htmlPC += '</a>';
          htmlPC += '</div>';
          htmlPC += '<div style="width: 80%" class="item-body">';
            htmlPC += '<h2 class="product-name">';
              htmlPC += '<a href="'+ value.url +'">'+ value.nameProduct +'</a>';
            htmlPC += '</h2>';
            htmlPC += '<span class="item-vendor">'+  value.sizeNameProduct +'/'+ value.colorNameProduct +'</span>';
            htmlPC += '<span class="item-price">';
              htmlPC += '<span class="price">'+ formatNumber(value.priceProduct, '.', ',') +'</span>';
            htmlPC += '</span>';
            htmlPC += '<div class="input_qty_pr">';
              htmlPC += '<input class="variantID" type="hidden" name="variantId" value="'+ value.quantilyProduct +'">';
            htmlPC += '</div>';
            htmlPC += '<a class="button remove-item-cart-index" title="Xóa" data-romve_id="'+ value.id +'">';
              htmlPC += '<span>Xóa sản phẩm</span>';
            htmlPC += '</a>';
          htmlPC += '</div>';
        htmlPC += '</div>';

        htmlSP += '<div class="item_cart productid-'+ value.id +'">';
          htmlSP += '<div class="image_cart_mobile">';
            htmlSP += '<a>';
              htmlSP += '<img width="75px" height="auto" src="'+ value.imageProduct +'">';
            htmlSP += '</a>';
          htmlSP += '</div>';
          htmlSP += '<div class="name_item_cart">';
            htmlSP += '<h3>';
              htmlSP += '<a href="'+ value.url +'">'+ value.nameProduct +'</a>';
            htmlSP += '</h3>';
            htmlSP += '<span class="variant-title">'+  value.sizeNameProduct +'/'+ value.colorNameProduct +'</span>';
            htmlSP += '<span class="item-price">Giá :';
              htmlSP += '<span class="price">'+ formatNumber(value.priceProduct, '.', ',') +'</span>';
            htmlSP += '</span>';
            htmlSP += '<a class="remove-item-cart-index" data-romve_id="'+ value.id +'" title="Xóa sản phẩm"> &nbsp;Xóa sản phẩm</a>';
          htmlSP += '</div>';
          htmlSP += '<div class="slg_cart">';
            htmlSP += '<div class="input_qty_pr">';
              htmlSP += '<input class="variantID" type="hidden" name="variantId" value="'+ value.quantilyProduct +'">';
            htmlSP += '</div>';
          htmlSP += '</div>';
        htmlSP += '</div>';
      });
      
      $('.count_item_pr').text(JSON.parse(readCartProduct()).length);
      $('.cart-tbody-PC').html(htmlPC);
      $('.body-item-SP').html(htmlSP);
      $('.totals_price-SP').text(formatNumber(totalPrice, '.', ','))
      $('.totals_price-PC').text(formatNumber(totalPrice, '.', ','))
    } else {
      $('.main-cart-index').html(htmlCartIndex);
    }
  }
});
