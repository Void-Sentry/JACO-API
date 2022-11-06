<?php 

namespace App\Service;

use App\Service\Abstractions\IServices\IUser;
use App\Models\Abstractions\IModels\IUser as MIUser;
use App\Service\Abstractions\AService;

final class SUser extends AService implements IUser
{
    public function __construct(MIUser $entity)
    {
        parent::__construct($entity);
    }
}

?>