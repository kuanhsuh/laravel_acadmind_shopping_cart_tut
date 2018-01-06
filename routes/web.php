
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

Route::get('login', 'UserController@getSignin')->name('login');

Route::get('/', [
    'uses'                     => 'ProductsController@index',
    'as'                       => 'product.index'
]);

Route::group(['prefix'         => 'user'], function() {
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/signup', [
            'uses'             => 'UserController@getSignup',
            'as'               => 'user.signup',
        ]);

        Route::post('/signup', [
            'uses'             => 'UserController@postSignup',
            'as'               => 'user.signup',
        ]);
        Route::get('/signin', [
            'uses'             => 'UserController@getSignin',
            'as'               => 'user.signin',
        ]);

        Route::post('/signin', [
            'uses'             => 'UserController@postSignin',
            'as'               => 'user.signin',
        ]);
    });

    Route::group(['middleware' => 'auth'], function(){
        Route::get('/profile', [
            'uses'             => 'UserController@getProfile',
            'as'               => 'user.profile',
        ]);

        Route::get('/logout', [
            'uses'             => 'UserController@getLogout',
            'as'               => 'user.logout',
        ]);
    });
});

Route::get('/add-to-cart/{id}', [
    'uses'                     => 'ProductsController@getAddToCart',
    'as'                       => 'product.addToCart'
]);

Route::get('/shopping-cart', [
    'uses'                     => 'ProductsController@getCart',
    'as'                       => 'product.shoppingCart'
]);

Route::get('/reduce/{id}', [
    'uses'                     => 'ProductsController@getReduceByOne',
    'as'                       => 'product.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses'                     => 'ProductsController@getRemoveItem',
    'as'                       => 'product.removeItem'
]);

Route::get('/checkout', [
    'uses'                     => 'ProductsController@getCheckout',
    'as'                       => 'checkout',
    'middleware'               => 'auth'
]);

Route::post('/checkout', [
    'uses'                     => 'ProductsController@postCheckout',
    'as'                       => 'checkout',
    'middleware'               => 'auth'
]);