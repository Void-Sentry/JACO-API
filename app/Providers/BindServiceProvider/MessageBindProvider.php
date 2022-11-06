<?php namespace App\Providers\BindServiceProvider;

use Illuminate\Support\ServiceProvider;

class MessageBindProvider extends ServiceProvider
{
    public function register(): void
    {
        \App::bind('App\Http\Controllers\Abstractions\IControllers\IMessage', 'App\Http\Controllers\CMessage');
        \App::bind('App\Service\Abstractions\IServices\IMessage', 'App\Service\SMessage');
        \App::bind('App\Models\Abstractions\IModels\IMessage', 'App\Models\Message');
    }
}
