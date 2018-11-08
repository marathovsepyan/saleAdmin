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

Route::get('/', 'Auth\LoginController@showLoginForm');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','checkRole:supplier']], function () {
    Route::get('/customer-create', 'SupplierController@createCustomer')->name('customer-create');
    Route::post('/customer-store', 'SupplierController@storeCustomer')->name('customer-store');
    Route::get('/customer-list', 'SupplierController@index')->name('customer-list');
    Route::post('/customer-update', 'SupplierController@updateCustomer')->name('customer-update');
    Route::get('/customer-edit/{id}', 'SupplierController@editCustomer')->name('customer-edit');
    Route::post('/account-settings', 'SupplierController@accountSettingsEdit')->name('account-settings-edit');
    Route::post('cusomerListDelete', 'SupplierController@deleteCustomer')->name('cusomerListDelete');
    Route::get('/account-settings', 'SupplierController@accountSettings')->name('account-settings');

    Route::get('/product-create', 'ProductController@createProduct')->name('product-create');
    Route::post('/product-store', 'ProductController@storeProduct')->name('product-store');
    Route::get('/product-list', 'ProductController@index')->name('product-list');
    Route::get('/product-edit/{id}', 'ProductController@editProduct')->name('product-edit');
    Route::post('/product-update', 'ProductController@updateProduct')->name('product-update');
    Route::post('productListDelete', 'ProductController@deleteProduct')->name('productListDelete');

    Route::get('/brand-create', 'BrandController@createBrand')->name('brand-create');
    Route::get('/brand-list', 'BrandController@index')->name('brand-list');
    Route::get('/brand-edit/{id}', 'BrandController@editBrand')->name('brand-edit');
    Route::post('/brand-store', 'BrandController@storeBrand')->name('brand-store');
    Route::post('brandListDelete', 'BrandController@deleteBrand')->name('brandListDelete');
    Route::post('brand-update', 'BrandController@updateBrand')->name('brand-update');

    Route::get('/color-create', 'ColorController@createColor')->name('color-create');
    Route::get('/color-list', 'ColorController@index')->name('color-list');
    Route::post('/color-store', 'ColorController@storeColor')->name('color-store');
    Route::get('/color-edit/{id}', 'ColorController@editColor')->name('color-edit');
    Route::post('colorListDelete', 'ColorController@deleteColor')->name('colorListDelete');
    Route::post('colorListShow', 'ProductController@colorListShow')->name('colorListShow');
    Route::post('color-update', 'ColorController@updateColor')->name('color-update');
});
Route::group(['middleware' => ['auth','checkRole:super_admin']], function () {
    Route::get('/size-create', 'AdminController@createSize')->name('size-create');
    Route::get('/size-list', 'AdminController@index')->name('size-list');
    Route::post('/size-store', 'AdminController@storeSize')->name('size-store');
    Route::get('/size-edit/{id}', 'AdminController@editSize')->name('size-edit');
    Route::post('size-update', 'AdminController@updateSize')->name('size-update');
    Route::post('sizeListDelete', 'AdminController@deleteSize')->name('sizeListDelete');
    Route::post('seasonDelete', 'AdminController@seasonDelete')->name('seasonDelete');
    Route::get('season-list', 'AdminController@showSeason')->name('showSeason');
    Route::get('season-edit/{season}', 'AdminController@seasonEdit')->name('season-edit');
    Route::get('season-create', 'AdminController@seasonCreate')->name('season-create');
    Route::post('season-store', 'AdminController@seasonStore')->name('season-store');
    Route::post('season-update', 'AdminController@seasonUpdate')->name('season-update');
});