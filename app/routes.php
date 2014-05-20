<?php

//route

Route::get('/', 'Controllers\HomeController:index');
Route::get('/login', 'Controllers\AuthController:index')->name('login');
Route::post('/login', 'Controllers\AuthController:store');
Route::get('/logout', 'Controllers\AuthController:logout')->name('logout');

Route::group('/admin', 'Auth', function(){
	Route::get('/', 'Controllers\HomeController:index');
});



