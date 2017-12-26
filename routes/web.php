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
 Route::get('/branch/create', 'BranchController@CreateBranch');
 Route::post('/branch', 'BranchController@saveBranch');
 Route::get('/branch/list_branch', 'BranchController@Branch');
 Route::get('/branch/{branch}/edit', 'BranchController@editBranch');
 Route::put('branch/{branch}', 'BranchController@updateBranch');
 Route::get('/branch/{branch}/delete', 'BranchController@deleteBranch');
 Route::get('/users', 'UserController@index');
 Route::get('/search/price', 'UserController@store');


});


Route::get('/', function () {
    return view('user.page.contents');
});
Route::get('/admin', function() {
    return view('auth.admin.branch.create_branch');
});
Route::get('/tao', function(){
  return view('user');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
