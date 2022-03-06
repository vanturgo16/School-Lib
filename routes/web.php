<?php

use Illuminate\Support\Facades\Route;

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

//start Login
Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');
Route::get('/resetpass', 'App\Http\Controllers\AuthController@resetpass');
Route::post('/resetpass/submit', 'App\Http\Controllers\AuthController@doreset');
Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
//end Login

Route::group(['middleware'=>'auth'],function() {
    //home
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->middleware(['checkRole:1,0']);

    //user
    Route::resource('/masters/users', 'App\Http\Controllers\UserController')->middleware(['checkRole:1']);
    Route::get('/masters/users/activate/{id}', 'App\Http\Controllers\UserController@ActiveUser')->middleware(['checkRole:1']);
    Route::get('/masters/users/revoke/{id}', 'App\Http\Controllers\UserController@RevokeUser')->middleware(['checkRole:1']);

    //author
    Route::resource('/masters/authors', 'App\Http\Controllers\AuthorsController')->middleware(['checkRole:1']);

    //category
    Route::resource('/masters/categories', 'App\Http\Controllers\BookCategoryController')->middleware(['checkRole:1']);

    //book
    Route::post('/masters/books/stock/{id}', 'App\Http\Controllers\BooksController@addStock')->middleware(['checkRole:1']);
    Route::post('masters/books/update-book/{book_id}', 'App\Http\Controllers\BooksController@updateBook')->middleware(['checkRole:1']);

    Route::get('/masters/books/search', 'App\Http\Controllers\BooksController@search')->middleware(['checkRole:1,0']);
    Route::get('/masters/books/delete/{id}', 'App\Http\Controllers\BooksController@delete')->middleware(['checkRole:1']);
    Route::resource('/masters/books', 'App\Http\Controllers\BooksController')->middleware(['checkRole:1']);
});