<?php 

namespace App\Repository;

use App\Repository\Abstractions\ARepository;
use App\Repository\Abstractions\IRepository;
use App\Models\ChatPrivate;

class RChatPrivate extends ARepository implements IRepository
{
    public function __construct(ChatPrivate $entity)
    {
        parent::__construct($entity);
    }
}