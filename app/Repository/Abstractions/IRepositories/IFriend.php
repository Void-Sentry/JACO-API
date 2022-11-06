<?php

namespace App\Repository\Abstractions\IRepositories;

use App\Repository\Abstractions\IRepository;

interface IFriend extends IRepository
{
    public function auth_user_list_friends(int $id): object;

    public function pending(int $id): object;

    public function accept_friend(int $id): bool;
}

?>