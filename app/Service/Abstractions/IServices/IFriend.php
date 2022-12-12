<?php

namespace App\Service\Abstractions\IServices;

use App\Service\Abstractions\IService;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Friend;

interface IFriend extends IService
{
    public function auth_user_list_friends(int $id): Collection;

    public function pending(int $id): Collection;

    public function accept_friend(int $id): Friend;

    public function blocked_friends(): Collection;

    public function block_friend(string $id): void;

    public function restore_friend(string $id): void;
}

?>