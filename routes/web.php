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
//index

Route::get('/', 'ProductController@home');
Route::get('/search', 'ProductController@getSearch');
Route::get('/products/new', 'ProductController@newProduct');
Route::get('/products/{product}', 'ProductController@showProduct');
Route::get('/products/branch/{name}', 'BranchController@getBranch');
Route::get('/pricesearch', 'ProductController@PriceSearch');
Route::get('/products/sale/allproduct', 'ProductController@getAllSale');


Route::group(['prefix'=>'admin','middleware' => 'checkadmin'],function(){
  Route::get('/', 'HomeController@indexAdmin');

  // Branch
 Route::get('/branch/create', 'BranchController@CreateBranch');
 Route::post('/branch', 'BranchController@saveBranch');
 Route::get('/branch/list_branch', 'BranchController@Branch');
 Route::get('/branch/{branch}/edit', 'BranchController@editBranch');
 Route::get('/branch/search', 'BranchController@search_branch');
 Route::put('branch/{branch}', 'BranchController@updateBranch');
 Route::get('/branch/{branch}/delete', 'BranchController@deleteBranch');
 // end Branch

 Route::get('/users', 'UserController@index');
 Route::get('/users/search', 'UserController@searchUser');
 Route::get('/users/order/{user}', 'UserController@OrdersList');
 Route::get('/users/order/{id}/detail' , 'UserController@detail');
 Route::get('/users/export' , 'UserController@export_user');

 //slider
 Route::get('/slide/list_slide', 'SlideController@listSlide');
 Route::get('/slide/create', 'SlideController@createSlide');
 Route::post('/slide', 'SlideController@saveSlide');
 Route::get('/slide/{slide}/edit', 'SlideController@editSlide');
 Route::put('slide/{slide}', 'SlideController@updateSlide');
 Route::get('/slide/{slide}/delete', 'SlideController@deleteSlide');
 //Chart
 Route::get('/chart' , 'HomeController@Statistical');
});

Route::group(['prefix' => 'admin','middleware' => 'checkadmin'],function(){
 /// product
 Route::get('/product/list_product','ProductController@allProduct');
 Route::get('/product/list_top_product','ProductController@topProduct');
 Route::get('/product/{product}/delete','ProductController@delete');
 Route::get('/product/{product}/edit','ProductController@editProduct');
 Route::put('/product/{product}','ProductController@updateProduct');
 Route::get('/product/create','ProductController@create');
 Route::post('/product/add','ProductController@addProduct');
 Route::get('/product/search', 'ProductController@search_product');

});

 //Shop Cart
  Route::get('carts/{id}/{size}/add', 'CartController@add');
  Route::get('carts/delete/{rowId}', 'CartController@delete');
  Route::get('carts/checkout', 'CartController@checkout');
  Route::get('carts/{rowId}/down-count', 'CartController@down_count');
	Route::get('carts/{rowId}/up-count', 'CartController@up_count');
  Route::get('carts/manage' , 'OrderController@manage')->middleware('auth');
	Route::get('carts/manage/{id}/cancel' , 'OrderController@cancel')->middleware('auth');
	Route::get('carts/manage/{id}/detail' , 'OrderController@detail')->middleware('auth');
  Route::get('carts/manage/export', 'OrderController@export_order');
	Route::get('carts/manage/{id}/detail/export', 'OrderController@export_order_detail');

Route::group(['prefix' => 'admin','middleware' => 'checkadmin'],function(){
  //order-admin
  Route::get('/order','OrderController@allOrder');
  Route::get('/search_order','OrderController@searchOrders');
  Route::get('order/done','OrderController@searchNoteDone');
  Route::get('order/in','OrderController@searchnoteInprocess');
  Route::get('/order/cancel','OrderController@cancelOrder');
  Route::get('/order/inprocess','OrderController@allOrderProcess');
  Route::put('/order/{order}/status','OrderController@upDateOrder');



});

//order
Route::get('/order/checkout' , 'OrderController@getOrder')->middleware('auth');
Route::post('/order', 'OrderController@SaveOrder');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
