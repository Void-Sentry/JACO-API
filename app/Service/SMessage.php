<?php 

namespace App\Service;

use App\Models\Abstractions\IModels\IMessage as MIMessage;
use App\Service\Abstractions\IServices\IMessage;
use App\Service\Abstractions\AService;

final class SMessage extends AService implements IMessage
{
    public function __construct(MIMessage $entity)
    {
        parent::__construct($entity);
    }
}

?>