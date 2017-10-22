<?php
Route::get('/', 'HomeController@index')
    ->name('home');

/* Auth */
Route::get('login', 'AuthController@showLoginForm')
    ->name('login');

Route::get('auth/{provider}', 'AuthController@redirectToProvider')
    ->name('auth');

Route::get('auth/{provider}/callback', 'AuthController@handleProviderCallback')
    ->name('auth.callback');

Route::post('logout', 'AuthController@logout')
    ->name('logout');

/* User */
Route::get('user/{id}', 'UserController@show')
    ->name('user.profile');

Route::get('user/{id}/edit', 'UserController@edit')
    ->name('user.edit');

Route::patch('user/{id}', 'UserController@update')
    ->name('user.update');

Route::get('user/{id}/verify-email/{token}', 'UserController@verifyEmail')
    ->name('user.email.verify');

Route::get('user/{id}/resend-verification-email', 'UserController@resendVerificationEmail')
    ->name('user.email.resend-verification-email');

/* SuperAdmin Pages */
Route::middleware('superadmin')->group(function () {
    Route::get('role-assignment', 'RoleAssignmentController@index')
        ->name('role-assignment.index');

    Route::get('role-assignment/create', 'RoleAssignmentController@create')
        ->name('role-assignment.create');

    Route::post('role-assignment', 'RoleAssignmentController@store')
        ->name('role-assignment.store');

    Route::delete('role-assignment/{id}', 'RoleAssignmentController@destroy')
        ->name('role-assignment.destroy');
});
