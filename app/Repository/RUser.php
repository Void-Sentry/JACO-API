<?php 

namespace App\Repository;

use App\Repository\Abstractions\ARepository;
use App\Repository\Abstractions\IRepositories\IUser;
use App\Models\User;

final class RUser extends ARepository implements IUser
{
    public function __construct(User $entity)
    {
        parent::__construct($entity);
    }
}