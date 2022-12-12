<?php

namespace App\Http\Controllers\Abstractions\IControllers;

use App\Http\Controllers\Abstractions\IController;
use Illuminate\Http\JsonResponse;

interface IFriend extends IController
{
    public function auth_user_list_friends(int $id): JsonResponse;
    
    public function pending(int $id): JsonResponse;

    public function accept_friend(int $id): JsonResponse;

    public function block_friend(string $id): JsonResponse;

    public function restore_friend(string $id): JsonResponse;
}