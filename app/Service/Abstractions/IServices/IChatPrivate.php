<?php

namespace App\Service\Abstractions\IServices;

use Illuminate\Database\Eloquent\Collection;
use App\Service\Abstractions\IService;

interface IChatPrivate extends IService 
{
    public function list_chats_from_user(array $friends): Collection;
}

?>