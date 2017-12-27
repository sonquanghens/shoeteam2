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
Route::get('/', 'ProductController@home');
Route::get('/search', 'ProductController@getSearch');
Route::get('/products/{product}', 'ProductController@showProduct');
Route::get('/products/branch/{name}', 'BranchController@getBranch');
Route::get('/pricesearch', 'ProductController@PriceSearch');



Route::group(['prefix'=>'admin','middleware' => 'checkadmin'],function(){
Route::get('/', function() {
      return view('auth.admin.user.users');
  });

  // Branch

 Route::get('/branch/create', 'BranchController@CreateBranch');
 Route::post('/branch', 'BranchController@saveBranch');
 Route::get('/branch/list_branch', 'BranchController@Branch');
 Route::get('/branch/{branch}/edit', 'BranchController@editBranch');
 Route::put('branch/{branch}', 'BranchController@updateBranch');
 Route::get('/branch/{branch}/delete', 'BranchController@deleteBranch');
 // end Branch
 Route::get('/users', 'UserController@index');
 Route::get('/search/price', 'UserController@store');
 });



Route::group(['prefix' => 'admin','middleware' => 'checkadmin'],function(){
 /// product
 Route::get('/product','ProductController@allProduct');
 Route::get('/product/{id}/delete','ProductController@delete');
 Route::get('/product/{id}/edit','ProductController@editProduct');
 Route::get('/product/create','ProductController@create');
 Route::post('/product/add','ProductController@addProduct');
 Route::put('product/{product}','ProductController@updateProduct');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
