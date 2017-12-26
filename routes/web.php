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
  // index admin
Route::get('/', function() {
  return view('auth.admin.branch.branch_list');
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

//  Route::group(['prefix' => 'admin','middleware' => 'checkadmin'],function(){
//  /// product
//  Route::get('/product','ProductController@allProduct');
//  Route::get('/product/delete/{id}','ProductController@delete');
//  Route::get('/product/create','ProductController@create');
//  Route::post('/product/add','ProductController@addProduct');
// });

// })->middleware('checkadmin');



Route::get('/', function () {
    return view('user.page.contents');

Route::group(['prefix' => 'admin','middleware' => 'checkadmin'],function(){
 Route::get('add', 'BranchController@getBranch');
 Route::post('add', 'BranchController@saveBranch');
 /// product
 Route::get('/product','ProductController@allProduct');
 Route::get('/product/delete/{id}','ProductController@delete');
 Route::get('/product/create','ProductController@create');
 Route::post('/product/add','ProductController@addProduct');

});
Route::get('/admin', function() {
    return view('admin.contents.content');
})->middleware('checkadmin');
// Route::get('/login',function(){
//   return view('user.login');
// });
// Route::get('/register',function(){
//   return view('user.register');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
