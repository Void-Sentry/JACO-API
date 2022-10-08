<?php namespace App\Providers\BindServiceProvider;

use Illuminate\Support\ServiceProvider;

class ChatPrivateBindProvider extends ServiceProvider
{
    public function register(): void
    {
        \App::bind('App\Http\Controllers\Abstractions\IControllers\IChatPrivate', 'App\Http\Controllers\CChatPrivate');
    }
}
