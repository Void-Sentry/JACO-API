<?php namespace App\Providers\BindServiceProvider;

use Illuminate\Support\ServiceProvider;

class ChatPrivateBindProvider extends ServiceProvider
{
    public function register(): void
    {
        \App::bind('App\Http\Controllers\Abstractions\IControllers\IChatPrivate', 'App\Http\Controllers\CChatPrivate');
        \App::bind('App\Service\Abstractions\IServices\IChatPrivate', 'App\Service\SChatPrivate');
        \App::bind('App\Models\Abstractions\IModels\IChatPrivate', 'App\Models\ChatPrivate');
    }
}
