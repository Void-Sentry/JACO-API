<?php namespace App\Providers\BindServiceProvider;

use Illuminate\Support\ServiceProvider;

class MessageBindProvider extends ServiceProvider
{
    public function register(): void
    {
        \App::bind('App\Http\Controllers\Abstractions\IControllers\IMessage', 'App\Http\Controllers\CMessage');
        \App::bind('App\Repository\Abstractions\IRepositories\IMessage', 'App\Repository\RMessage');
    }
}
