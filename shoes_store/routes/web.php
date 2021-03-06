<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::prefix('auth')->group(base_path('routes/auth.php'));
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
        Route::resource('size', 'SizeController');
        Route::resource('color', 'ColorController');
        Route::resource('category', 'CategoryController');
        Route::resource('shoes', 'ShoesController');
        Route::resource('customer', 'CustomerController');
        Route::resource('banner', 'BannerController');
        Route::resource('news', 'NewsController');
/****************************** Order **********************************/
        Route::get('order/get-product-shoes', 'OrderController@getProductShoes')->name('order.get_product_shoes');
        Route::get('order/get-infor-user', 'OrderController@getInforCustomer')->name('order.get_infor_user');
        Route::get('order/get-list-product-shoes-HTML', 'OrderController@getListProductShoesHTML')->name('order.get_list_product_shoes_HTML');
        Route::post('order/delete-product-shoes', 'OrderController@deleteProductShoes')->name('order.delete_product_shoes');
        Route::resource('order', 'OrderController');
/****************************** End Order ******************************/
    });
});


/****************************** ROUTE CLIENT ******************************/
// Route::group(['prefix' => '/', 'namespace' => 'Client'], function () {
//     // Route::get('/', 'HomePage@homePage')->name('home');
//     Route::get('/product-category/{slug}', 'CategoryController@index')->name('product_category');
//     // Route::get('/product-detail/{slug}', 'ShoesController@index')->name('product_detail');
//     Route::get('/cart', 'CartController@index')->name('product_cart');
//     Route::post('/processCheckout', 'CartController@processCheckout')->name('process_checkout');
//     Route::get('/news', 'NewsController@index')->name('news');
//     Route::get('/news/{slug}', 'NewsController@detail')->name('news_detail');
//     Route::get('/contact', 'ContactController@index')->name('contact');

//     /****************************** AUTH CLIENT ******************************/
//     Route::get('my-account/login', 'AuthClientController@indexLogin')->name('index_login');
//     Route::post('my-account/login', 'AuthClientController@postLogin')->name('post_login');
//     Route::get('my-account/register', 'AuthClientController@indexRegister')->name('index_register');
//     Route::post('my-account/register', 'AuthClientController@registerCustomer')->name('store_register');
// });


/****************************** ROUTE CLIENT V-2 ******************************/
Route::group(['prefix' => '/', 'namespace' => 'Client_V_2'], function () {
    Route::group(['namespace' => 'Checkout'], function () {
        Route::get('/checkout', 'CheckoutController@index')->name('checkout_index');
        Route::post('/checkout', 'CheckoutController@create')->name('checkout_create');
    });


    Route::get('/', 'Home\HomeClient@index')->name('home');
    Route::get('/{slug}', 'Product\ProductClient@detail')->name('product_detail');
    Route::get('/category/{slug}', 'Category\CategoryClient@index')->name('category');

    Route::get('/cart', 'Cart\CartClient@index')->name('cart_index');
});