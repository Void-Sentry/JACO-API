<?php namespace App\Providers\BindServiceProvider;

use Illuminate\Support\ServiceProvider;

class FriendBindProvider extends ServiceProvider
{
    public function register(): void
    {
        \App::bind('App\Http\Controllers\Abstractions\IControllers\IFriend', 'App\Http\Controllers\CFriend');
        \App::bind('App\Repository\Abstractions\IRepositories\IFriend', 'App\Repository\RFriend');
    }
}
