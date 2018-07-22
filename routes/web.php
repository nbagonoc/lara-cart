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
])->middleware('user');

// GET | Add to cart
Route::get('/add-to-cart/{id}', [
    'uses'=>'cartController@addToCart',
    'as'=>'cart.addToCart'
]);

// GET | Add unit cart
Route::get('/add-cart/{id}', [
    'uses'=>'cartController@addCart',
    'as'=>'cart.addCart'
])->middleware('user');

// GET | Reduce unit cart
Route::get('/reduce-cart/{id}', [
    'uses'=>'cartController@reduceCart',
    'as'=>'cart.reduceCart'
])->middleware('user');

// GET | Remove product from cart
Route::get('/remove-from-cart/{id}',[
    'uses'=>'cartController@removeFromCart',
    'as'=>'cart.removeFromCart'
])->middleware('user');

// GET | clear
Route::get('/clear', [
    'uses' => 'cartController@clear',
    'as' => 'cart.clear'
])->middleware('user');

// GET | checkout
Route::get('/checkout', [
    'uses' => 'cartController@checkout',
    'as' => 'cart.checkout'
])->middleware('user');

// POST | checkout process
Route::post('/checkout', [
    'uses' => 'cartController@checkoutProcess',
    'as' => 'cart.checkoutProcess'
])->middleware('user');

// GET | orders
Route::get('/orders', [
    'uses' => 'OrderController@customerOrders',
    'as' => 'order.customerOrders'
])->middleware('user');

// GET | Products - Manage
Route::get('/products/manage', [
    'uses'=>'ProductController@index',
    'as'=>'products.manage'
])->middleware('moderator');

// GET | Product show
Route::get('/product/{id}', [
    'uses'=>'ProductController@show',
    'as'=>'products.show'
]);

// GET | Product create
Route::get('/products/manage/create', [
    'uses'=>'ProductController@create',
    'as'=>'products.create'
])->middleware('moderator');

// GET | Product create
Route::post('/products/manage/store', [
    'uses'=>'ProductController@store',
    'as'=>'products.store'
])->middleware('moderator');

//GET | Product edit/update
Route::get('/products/manage/edit/{id}',[
    'uses' => 'ProductController@edit',
    'as' => 'products.edit'
])->middleware('moderator');

// PATCH | Product edit/update process
Route::patch('/products/manage/update/{id}', [
    'uses'=>'ProductController@update',
    'as'=>'products.update'
])->middleware('moderator');

// DELETE | Product delete
Route::delete('/products/manage/delete/{id}', [
    'uses'=>'ProductController@destroy',
    'as'=>'products.delete'
])->middleware('moderator');

// GET | Orders - Manage
Route::get('/orders/manage', [
    'uses'=>'OrderController@index',
    'as'=>'orders.manage'
])->middleware('moderator');

// GET | Orders - Show
Route::get('/orders/manage/show/{id}', [
    'uses'=>'OrderController@show',
    'as'=>'orders.show'
])->middleware('moderator');

// GET | Users - Manage
Route::get('/users/manage', [
    'uses'=>'UserController@index',
    'as'=>'users.manage'
])->middleware('admin');

// GET | Users -  create
Route::get('/users/manage/create', [
    'uses'=>'UserController@create',
    'as'=>'users.create'
]);

// GET | User - Acount
Route::get('/account', [
    'uses'=>'AccountController@index',
    'as'=>'account.index'
])->middleware('auth');

Auth::routes();
