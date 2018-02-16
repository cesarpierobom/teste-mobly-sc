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
Route::redirect('/', '/home', 301);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('comments', 'WebControllers\CommentController');

Route::resource('posts', 'WebControllers\PostController');

Route::get('posts/{id}/comments/', 'WebControllers\CommentController@showCommentsByPostId')->name('showCommentsByPostId');

Route::get('posts_import', 'WebControllers\PostsImportController@requestNewImport')->name('requestNewPosts');

Route::get('comments_import', 'WebControllers\CommentsImportController@requestNewImport')->name('requestNewComments');

Route::view('/front', 'front')->name('front');
