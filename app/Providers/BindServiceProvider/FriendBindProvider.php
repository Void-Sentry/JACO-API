<?php namespace App\Providers\BindServiceProvider;

use Illuminate\Support\ServiceProvider;

class FriendBindProvider extends ServiceProvider
{
    public function register(): void
    {
        \App::bind('App\Http\Controllers\Abstractions\IControllers\IFriend', 'App\Http\Controllers\CFriend');
        \App::bind('App\Service\Abstractions\IServices\IFriend', 'App\Service\SFriend');
        \App::bind('App\Models\Abstractions\IModels\IFriend', 'App\Models\Friend');
    }
}
