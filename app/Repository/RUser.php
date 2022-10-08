<?php 

namespace App\Repository;

use App\Repository\Abstractions\ARepository;
use App\Repository\Abstractions\IRepository;
use App\Models\User;

class RUser extends ARepository implements IRepository
{
    public function __construct(User $entity)
    {
        parent::__construct($entity);
    }
}