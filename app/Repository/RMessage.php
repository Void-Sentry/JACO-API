<?php 

namespace App\Repository;

use App\Repository\Abstractions\ARepository;
use App\Repository\Abstractions\IRepositories\IMessage;
use App\Models\Message;

final class RMessage extends ARepository implements IMessage
{
    public function __construct(Message $entity)
    {
        parent::__construct($entity);
    }
}