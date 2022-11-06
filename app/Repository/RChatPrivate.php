<?php 

namespace App\Repository;

use App\Repository\Abstractions\ARepository;
use App\Repository\Abstractions\IRepository;
use App\Repository\Abstractions\IRepositories\IChatPrivate;
use App\Models\ChatPrivate;

final class RChatPrivate extends ARepository implements IChatPrivate
{
    public function __construct(ChatPrivate $entity)
    {
        parent::__construct($entity);
    }
}