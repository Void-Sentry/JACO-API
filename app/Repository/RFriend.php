<?php 

namespace App\Repository;

use App\Repository\Abstractions\ARepository;
use App\Repository\Abstractions\IRepository;
use App\Models\Friend;

class RFriend extends ARepository implements IRepository
{
    public function __construct(Friend $entity)
    {
        parent::__construct($entity);
    }
}