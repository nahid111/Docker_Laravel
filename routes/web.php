<?php


Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/blog', 'PagesController@blogPosts');
Route::get('/blog/{postID}', 'PostsController@show');




// User Authentication
Auth::routes();
Route::get('/dashboard', 'DashboardController@index');



Route::resource('posts', 'PostsController');





