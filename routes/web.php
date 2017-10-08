<?php
Route::get('/', 'HomeController@index')->name('home');

Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');

