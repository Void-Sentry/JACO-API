<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Abstractions\IControllers\IFriend;

Route::controller(IFriend::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/show', 'show');
    Route::post('/', 'create');
    Route::put('/', 'update');
    Route::delete('/', 'destroy');

    Route::get('auth_user_list_friends/{id}', 'auth_user_list_friends');
    Route::get('pending/{id}', 'pending');
    Route::patch('accept_friend/{id}', 'accept_friend');
});
