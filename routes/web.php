<?php
Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider')->name('auth');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::post('logout', 'Auth\AuthController@logout')->name('logout');

