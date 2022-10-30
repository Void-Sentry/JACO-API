<?php

namespace App\Repository\Abstractions\IRepositories;

interface IFriend
{
    public function auth_user_list_friends(int $id): object;

    public function pending(int $id): object;

    public function accept_friend(int $id): bool;
}

?>