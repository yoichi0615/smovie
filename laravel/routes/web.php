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

Auth::routes();
Route::get('/','ArticleController@index')->name('article.index')->middleware('auth');
Route::resource('/article','ArticleController')->except(['index'])->middleware('auth');

Route::prefix('article')->name('article.')->group(function() {
    Route::put('/{article}/like','ArticleController@like')->name('like')->middleware('auth');
    Route::delete('/{article}/like','ArticleController@unlike')->name('unlike')->middleware('auth');
});

Route::prefix('users')->name('users.')->group(function() {
    Route::get('/{name}','UserController@show')->name('show')->middleware('auth');
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');
    Route::put('/{name}/follow','UserController@follow')->name('follow');
    Route::delete('/{name}/follow','UserController@unfollow')->name('unfollow');
});
