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

//Route::get('/products', 'ProductController@index')->name('product.index');
//Route::get('/product/{id}', 'ProductController@show')->name('product.show');

Route::name('product.')
    ->group(function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/product/{id}', 'ProductController@show')->name('show');
    });

Route::name('line_item.')
    ->group(function () {
        Route::post('/line_item/create', 'LineItemController@create')->name('create');
        Route::post('/line_item/delete', 'LineItemController@delete')->name('delete');
    });

Route::name('cart.')
    ->group(function () {
        Route::get('/cart', 'CartController@index')->name('index');
        Route::get('/cart/checkout', 'CartController@checkout')->name('checkout');
        Route::get('/cart/success', 'CartController@success')->name('success');
        Route::get('/cart/show_history/', 'CartController@show_history')->name('show_history');
    });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//管理側
Route::group(['middleware' => ['auth.admin']], function () {

    //管理側トップ
    Route::get('/admin', 'admin\AdminTopController@show')->name('admintop');
    //ログアウト実行
    Route::post('/admin/logout', 'admin\AdminLogoutController@logout')->name('adminlogout');
    //ユーザー一覧
    Route::get('/admin/user_list', 'admin\ManageUserController@showUserList');
    //ユーザー詳細
    Route::get('/admin/user/{id}', 'admin\ManageUserController@showUserDetail');

    //管理者　ユーザー登録
    Route::get('/admin/add', 'admin\ManageUserController@add')->name('user_add');
    Route::post('/admin/add', 'admin\ManageUserController@create')->name('user_create');

    //管理者　管理者登録
    Route::get('/admin/create', 'admin\ManageAdminController@add')->name('admin_add');
    Route::post('/admin/create', 'admin\ManageAdminController@create')->name('admin_create');

    //管理者一覧
    Route::get('/admin/admin_list', 'admin\ManageAdminController@showAdminList');
    //管理者詳細
    Route::get('/admin/admin_detail/{id}', 'admin\ManageAdminController@showAdminDetail');

});

//管理側ログイン
Route::get('/admin/login', 'admin\AdminLoginController@showLoginform');
Route::post('/admin/login', 'admin\AdminLoginController@login');
