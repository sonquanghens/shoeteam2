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

Route::group(['prefix'=>'admin'],function(){
 Route::get('/addbranch', 'BranchController@CreateBranch');
 Route::post('/add', 'BranchController@saveBranch');
 Route::get('/branch', 'BranchController@Branch');


});


Route::get('/', function () {
    return view('user.page.contents');
});
Route::get('/admin', function() {
    return view('admin.contents.content');
});
Route::get('/tao', function(){
  return view('user');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
