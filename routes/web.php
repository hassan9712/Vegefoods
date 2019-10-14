<?php

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/', 'HomeController@index')->name('/');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/contact-us', 'HomeController@contact')->name('contact-us');
Route::get('/about', 'HomeController@about')->name('about');