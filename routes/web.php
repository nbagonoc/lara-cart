<?php

// GET | home
Route::get('/', [
    'uses' => 'PageController@home',
    'as' => 'pages.home'
]);

// GET | shop by category
Route::get('/shop/{category}', [
    'uses' => 'PageController@shopByCategory',
    'as' => 'pages.shopByCategory'
]);

// GET | search product
Route::any('/search',[
    'uses' => 'PageController@search',
    'as' => 'pages.search'
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
])->middleware('auth','user');

// GET | Add to cart
Route::get('/add-to-cart/{id}', [
    'uses'=>'cartController@addToCart',
    'as'=>'cart.addToCart'
]);

// GET | Add unit cart
Route::get('/add-cart/{id}', [
    'uses'=>'cartController@addCart',
    'as'=>'cart.addCart'
])->middleware('auth','user');

// GET | Reduce unit cart
Route::get('/reduce-cart/{id}', [
    'uses'=>'cartController@reduceCart',
    'as'=>'cart.reduceCart'
])->middleware('auth','user');

// GET | Remove product from cart
Route::get('/remove-from-cart/{id}',[
    'uses'=>'cartController@removeFromCart',
    'as'=>'cart.removeFromCart'
])->middleware('auth','user');

// GET | clear
Route::get('/clear', [
    'uses' => 'cartController@clear',
    'as' => 'cart.clear'
])->middleware('auth','user');

// GET | checkout
Route::get('/checkout', [
    'uses' => 'cartController@checkout',
    'as' => 'cart.checkout'
])->middleware('auth','user');

// POST | checkout process
Route::post('/checkout', [
    'uses' => 'cartController@checkoutProcess',
    'as' => 'cart.checkoutProcess'
])->middleware('auth','user');

// GET | orders
Route::get('/orders', [
    'uses' => 'OrderController@customerOrders',
    'as' => 'order.customerOrders'
])->middleware('auth','user');

// GET | Products - Manage
Route::get('/products/manage', [
    'uses'=>'ProductController@index',
    'as'=>'products.manage'
])->middleware('auth','moderator');

// GET | Product show
Route::get('/product/{id}', [
    'uses'=>'ProductController@show',
    'as'=>'products.show'
]);

// GET | Product create
Route::get('/products/manage/create', [
    'uses'=>'ProductController@create',
    'as'=>'products.create'
])->middleware('auth','moderator');

// GET | Product create
Route::post('/products/manage/store', [
    'uses'=>'ProductController@store',
    'as'=>'products.store'
])->middleware('auth','moderator');

//GET | Product edit/update
Route::get('/products/manage/edit/{id}',[
    'uses' => 'ProductController@edit',
    'as' => 'products.edit'
])->middleware('auth','moderator');

// PATCH | Product edit/update process
Route::patch('/products/manage/update/{id}', [
    'uses'=>'ProductController@update',
    'as'=>'products.update'
])->middleware('auth','moderator');

// DELETE | Product delete
Route::delete('/products/manage/delete/{id}', [
    'uses'=>'ProductController@destroy',
    'as'=>'products.delete'
])->middleware('auth','moderator');

// GET | Orders - Manage
Route::get('/orders/manage', [
    'uses'=>'OrderController@index',
    'as'=>'orders.manage'
])->middleware('auth','moderator');

// GET | Orders - Show
Route::get('/orders/manage/show/{id}', [
    'uses'=>'OrderController@show',
    'as'=>'orders.show'
])->middleware('auth','moderator');

// GET | Orders - edit/update status
Route::get('/orders/manage/edit/{id}', [
    'uses'=>'OrderController@edit',
    'as'=>'orders.edit'
])->middleware('auth','moderator');

// GET | Orders - edit/update status process
Route::patch('/orders/manage/update/{id}', [
    'uses'=>'OrderController@update',
    'as'=>'orders.update'
])->middleware('auth','moderator');

// GET | Users - Manage
Route::get('/users/manage', [
    'uses'=>'UserController@index',
    'as'=>'users.manage'
])->middleware('auth','admin');

Auth::routes();
