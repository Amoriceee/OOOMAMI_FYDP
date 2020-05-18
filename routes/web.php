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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

  //HOME ROUTES
  Route::get('/home', 'HomeController@index')->name('home');
  Route::post('/home', 'FeedController@create');
  Route::get('/lul/{uid}/{pid}', 'FeedController@lul');
  //RECIPE ROUTES
  Route::get('/rec', function () {
      return view('recipes');
  });
  Route::post('/rec', function () {
      return view('recipes');
  });
  Route::get('/rec/{id}/', 'RecipeController@indindex');
  Route::post('/rec/{id}/', 'RecipeController@htc');
  Route::post('/rec2shop', 'ShoppingController@buildShoppingList');
  //COMMUNITY
  Route::get('/myc', function () {
      return view('community');
  });
  Route::get('/myc/create', function() {
    return view('createrec');
  });
  //COOKBOOK ROUTES
  Route::get('/cb', function () {
      return view('cookbook');
  });
  Route::post('cb', 'CookbookController@newCb');
  Route::get('/cb/{cbid}', 'CookbookController@index');
  Route::post('/cb/{cbid}', 'CookbookController@fA');
  Route::get('/cb/{cbid}/del', 'CookbookController@delCookbook');
  //SHOPPING LIST ROUTES
  Route::get('/shopl', function () {
      return view('shoppinglist');
  });
  Route::get('/shopl/del/{id}', 'ShoppingController@del');
  Route::post('/shopl', 'ShoppingController@fA');
  //ARTICLES ROUTES
  Route::get('/art', function () {
      return view('article');
  });
  Route::get('/art/{id}', function () {
      return view('indart');
  });
  //USRPREF ROUTES
  Route::get('/usrpref', function () {
      return view('usrpref');
  });
  Route::post('/usrpref', 'HomeController@fA');
  Route::get('/dpreset', 'HomeController@resetDisplay');
  //CONTACT
  Route::get('/contact', function () {
      return view('contact');
  });
  Route::post('/contact', 'ContactController@sendadd');
  //LOGOUT
  Route::get('/logout', 'Auth\LoginController@logout');

 });
