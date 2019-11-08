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


//-------------------------------------
Auth::routes();



/**************************************
 * Start Front Routes
 **************************************/

Route::group(['namespace' => 'Front'], function () {

    // Home Route
    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');

    // About Route
    Route::get('about', 'AboutController@index');

    // Contact Route
    Route::get('contact', 'ContactController@index');
    Route::post('contact/message', 'ContactController@message');

    // Search Route
    Route::get('search', 'SearchController@search');


    // Categories Route
    Route::get('categories', 'CategoriesController@index');
    Route::get('categories/{slug}', 'CategoriesController@view');

    // Brands Route
    Route::get('brands', 'BrandsController@index');
    Route::get('brands/{slug}', 'BrandsController@view');

    // Products Route
    Route::get('products', 'ProductsController@index');
    Route::get('products/{slug}', 'ProductsController@view');

    // Cart Route
    Route::get('cart', 'CartController@index');
    Route::post('cart/add', 'CartController@store');
    Route::post('cart/update', 'CartController@update');
    Route::post('cart/delete', 'CartController@deleteItem');


    Route::group(['middleware' => 'auth'], function () {

        // Check Cart Route
        Route::get('check-cart', 'CartController@CheckCart');

        // Profile Route
        Route::get('profile', 'ProfileController@index');
        Route::post('profile', 'ProfileController@update');

        // Checkout Route
        Route::get('checkout', 'CheckoutController@index');
        Route::post('checkout/confirm', 'CheckoutController@confirm');

        // Order Route
        Route::get('orders', 'OrdersController@index');
        Route::post('orders/order/cancel', 'OrdersController@cancel');

    });

});

/**************************************
 * End Front Routes
 **************************************/



/**************************************
 * Back Controllers
**************************************/

Route::group(['namespace' => 'Back', 'prefix' => 'admin'], function () {


    Route::group(['middleware' => 'adminGuest:admin'], function () {
        // Route Login
        Route::get('login', 'AdminController@login_get');
        Route::post('login', 'AdminController@login_post');
    });


    Route::group(['middleware' => 'adminWeb:admin'], function () {

        // Route Logout
        Route::get('logout', 'AdminController@logout');

        // Route Home
        Route::get('home', 'HomeController@index');

        // Route Setting
        Route::get('setting', 'SettingController@index');
        Route::post('setting/update', 'SettingController@update');

        // Route Profile
        Route::get('profile', 'ProfileController@index');
        Route::post('profile/update', 'ProfileController@update');


        // Route Admins
        Route::get('admins', 'AdminsController@index');
        Route::get('admins/create', 'AdminsController@create');
        Route::post('admins/store', 'AdminsController@store');
        Route::get('admins/{id}/view', 'AdminsController@view');
        Route::get('admins/{id}/edit', 'AdminsController@edit');
        Route::post('admins/{id}/update', 'AdminsController@update');
        Route::get('admins/{id}/delete', 'AdminsController@destroy');


        // Users Route
        Route::get('users', 'UsersController@index');
        Route::get('users/{id}/view', 'UsersController@view');
        Route::get('users/{id}/delete', 'UsersController@delete');


        // Route Categories
        Route::get('categories', 'CategoriesController@index');
        Route::get('categories/create', 'CategoriesController@create');
        Route::post('categories/store', 'CategoriesController@store');
        Route::get('categories/{id}/view', 'CategoriesController@view');
        Route::get('categories/{id}/edit', 'CategoriesController@edit');
        Route::post('categories/{id}/update', 'CategoriesController@update');
        Route::get('categories/{id}/delete', 'CategoriesController@destroy');


        // Route Brands
        Route::get('brands', 'BrandsController@index');
        Route::get('brands/create', 'BrandsController@create');
        Route::post('brands/store', 'BrandsController@store');
        Route::get('brands/{id}/view', 'BrandsController@view');
        Route::get('brands/{id}/edit', 'BrandsController@edit');
        Route::post('brands/{id}/update', 'BrandsController@update');
        Route::get('brands/{id}/delete', 'BrandsController@destroy');


        // Route Products
        Route::get('products', 'ProductsController@index');
        Route::get('products/create', 'ProductsController@create');
        Route::post('products/store', 'ProductsController@store');
        Route::get('products/{id}/view', 'ProductsController@view');
        Route::get('products/{id}/edit', 'ProductsController@edit');
        Route::post('products/{id}/update', 'ProductsController@update');
        Route::get('products/{id}/delete', 'ProductsController@destroy');


        // Orders Route
        Route::get('orders', 'OrdersController@index');
        Route::get('orders/{id}/view', 'OrdersController@view');
        Route::get('orders/{id}/delete', 'OrdersController@destroy');
        Route::post('orders/multi/delete', 'OrdersController@multiDelete');
        Route::post('orders/status', 'OrdersController@changeStatus');


        // Route About
        Route::get('about', 'AboutController@index');
        Route::post('about/update', 'AboutController@update');


        // Route messages
        Route::get('messages', 'MessagesController@index');
        Route::get('messages/{id}/view', 'MessagesController@view');
        Route::get('messages/{id}/delete', 'MessagesController@destroy');
        Route::post('messages/multi/delete', 'MessagesController@multiDelete');

    });



});
