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
