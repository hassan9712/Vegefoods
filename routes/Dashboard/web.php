<?php

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth','Admin'])->group(function() {
    Route::get('/', 'HomeController@index');
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('blogs', 'BlogController');
    Route::resource('sliders', 'SliderController');
    Route::resource('customers', 'CustomerController');
    Route::resource('logos', 'LogoController');
    Route::resource('contact', 'ContactController');
});