<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'json.response']], function () {

    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');

    Route::post('/register', 'Auth\ApiAuthController@register')->name('register.api');

});

Route::middleware('auth:api')->group(function () {

    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');

});

 Route::post('/change-password/{email}', 'Auth\ApiAuthController@change_password')->name('change-password.api');

