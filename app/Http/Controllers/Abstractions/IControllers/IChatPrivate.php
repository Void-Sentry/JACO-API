<?php

namespace App\Http\Controllers\Abstractions\IControllers;

use App\Http\Controllers\Abstractions\IController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface IChatPrivate extends IController
{
    public function list_chats_from_user_authenticated(): JsonResponse;
}