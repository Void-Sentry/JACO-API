<?php 

namespace App\Http\Controllers;

use App\Repository\Abstractions\IRepositories\IMessage as RIMessage;
use App\Http\Controllers\Abstractions\IControllers\IMessage;
use App\Http\Controllers\Abstractions\AController;

final class CMessage extends AController implements IMessage
{
    public function __construct(RIMessage $repository)
    {
        parent::__construct($repository);
    }
}