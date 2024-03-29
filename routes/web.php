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

Route::get('/article-{article_id}', 'ArticleController@article')->name('article');

Route::post('/add-comment', 'CommentController@addComment')->name('add-comment');

Auth::routes();

Route::get('/', 'MainController@index')->name('main');
