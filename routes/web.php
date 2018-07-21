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
    'uses' => 'orderController@customerOrders',
    'as' => 'order.customerOrders'
])->middleware('auth');

Auth::routes();
