@extends('client.layout.app')

@section('content-client')
  <div class="site-content-wrapper" style="margin-top: 0px;">
    <div class="row small-collapse">
      <div class="small-12 columns">
        <div class="site-content">
          <article id="post-6" class="post-6 page type-page status-publish hentry">
            <header class="entry-header">
              <h1 class="entry-title">Cart
              </h1>    
            </header>
            <!-- .entry-header -->
            <div class="entry-content">
              <div class="woocommerce">
                <div class="woocommerce-notices-wrapper">
                </div>
                <form class="woocommerce-cart-form" action="https://thehanger.wp-theme.design/cart/" method="post">
                  <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="product-remove">&nbsp;
                        </th>
                        <th class="product-thumbnail">&nbsp;
                        </th>
                        <th class="product-name">Product
                        </th>
                        <th class="product-price">Price
                        </th>
                        <th class="product-quantity">Quantity
                        </th>
                        <th class="product-subtotal">Subtotal
                        </th>
                      </tr>
                    </thead>
                    <tbody id="item-in-cart">

                    </tbody>
                  </table>
                  <input type="hidden" name="lPyfaicJWN" value="Vhsl07tdok">
                  <input type="hidden" name="dQSIJVoz-hWqNi" value="nVFXBuCzS@oc_M">
                  <input type="hidden" name="UzkEGumLhel" value="tFQCp518S_U">
                  <div class="cart-collaterals">
                    <div class="cart_totals " style="width: 100%;">
                      <table cellspacing="0" class="shop_table shop_table_responsive">
                        <tbody>
                          <tr class="order-total">
                            <th>Total
                            </th>
                            <td data-title="Total">
                              <strong>
                                <span class="woocommerce-price-total-cart amount">
                                  <bdi>
                                    <span class="woocommerce-Price-currencySymbol">$
                                    </span>0
                                  </bdi>
                                </span>
                              </strong> 
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="fix-cart">
                        <div class="wc-proceed-to-checkout" style="display: inline-block;">
                          <a href="https://thehanger.wp-theme.design/checkout/" class="checkout-button button alt wc-forward">
                            Proceed to checkout
                          </a>
                        </div>
                        <div class="continue-shopping" style="display: inline-block; margin-right: 10px;"> 
                          <a href="https://thehanger.wp-theme.design/shop/" class="button">Continue shopping
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
                <div id="cart_bottom_anchor">
                </div>
              </div>
            </div>
            <!-- .entry-content -->
          </article>
          <!-- #post-## -->
        </div>
      </div>
    </div>
    <div class="hover_overlay_content">
    </div>
  </div>
@endsection
