<?php 

namespace App\Repository;

use App\Repository\Abstractions\ARepository;
use App\Repository\Abstractions\IRepository;
use App\Models\Message;

class RMessage extends ARepository implements IRepository
{
    public function __construct(Message $entity)
    {
        parent::__construct($entity);
    }
}