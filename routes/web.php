<?php

Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');

Route::get('/', function () {
    return view('welcome');
});
