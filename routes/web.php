<?php

// GET | home
Route::get('/', [
    'uses' => 'PageController@home',
    'as' => 'pages.home'
]);

// GET | dashboard
Route::get('/dashboard', [
    'uses'=>'DashboardController@index',
    'as'=>'pages.dashboard'
])->middleware('auth');

// GET | Cart
Route::get('/cart', [
    'uses'=>'cartController@cart',
    'as'=>'cart.index'
])->middleware('auth');

// GET | Add to cart
Route::get('/add-to-cart/{id}', [
    'uses'=>'cartController@addToCart',
    'as'=>'cart.addToCart'
]);

// GET | Add unit cart
Route::get('/add-cart/{id}', [
    'uses'=>'cartController@addCart',
    'as'=>'cart.addCart'
]);

// GET | Reduce unit cart
Route::get('/reduce-cart/{id}', [
    'uses'=>'cartController@reduceCart',
    'as'=>'cart.reduceCart'
]);

// GET | Remove product from cart
Route::get('/remove-from-cart/{id}',[
    'uses'=>'cartController@removeFromCart',
    'as'=>'cart.removeFromCart'
]);

// GET | clear
Route::get('/clear', [
    'uses' => 'cartController@clear',
    'as' => 'cart.clear'
])->middleware('auth');

// GET | checkout
Route::get('/checkout', [
    'uses' => 'cartController@checkout',
    'as' => 'cart.checkout'
])->middleware('auth');

// POST | checkout process
Route::post('/checkout', [
    'uses' => 'cartController@checkoutProcess',
    'as' => 'cart.checkoutProcess'
])->middleware('auth');

// GET | orders
Route::get('/orders', [
    'uses' => 'OrderController@customerOrders',
    'as' => 'order.customerOrders'
])->middleware('auth');

// GET | Products - Manage
Route::get('/products/manage', [
    'uses'=>'ProductController@index',
    'as'=>'pages.dashboard'
])->middleware('auth','moderator');

Auth::routes();
