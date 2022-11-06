<?php namespace App\Providers\BindServiceProvider;

use Illuminate\Support\ServiceProvider;

class UserBindProvider extends ServiceProvider
{
    public function register(): void
    {
        \App::bind('App\Http\Controllers\Abstractions\IControllers\IUser', 'App\Http\Controllers\CUser');
        \App::bind('App\Repository\Abstractions\IRepositories\IUser', 'App\Repository\RUser');
    }
}
