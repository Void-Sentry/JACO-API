<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Abstractions\IControllers\IMessage;

Route::controller(IMessage::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/show', 'show');
    Route::post('/', 'create');
    Route::put('/', 'update');
    Route::delete('/', 'destroy');
});
