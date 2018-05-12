<?php

use Illuminate\Http\Request;
use IUTLib\Member;
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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/catalog', 'PagesController@catalog');
Route::get('/bookDetail/{id}', 'PagesController@bookDescription');
Route::get('/bookDownload/{id}', 'PagesController@bookDownload');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('Home');
Route::get('/personalinfo', function(){
	return view('personalInfo');
});
Route::resource('members', 'MembersController');
Route::resource('books', 'BooksController');
Route::resource('passwords', 'PasswordsController');
Route::get('/textbooks', function(){
	return view('pages.textbooks');
});

Route::post('/comments/', "CommentsController@store");
Route::get('/comments/{id}/delete', "CommentsController@destroy");
Route::get('/search', "PagesController@search");
Route::get('pagenotfound', ['as' => 'notfound', 'uses' => 'HomeController@pagenotfound']);