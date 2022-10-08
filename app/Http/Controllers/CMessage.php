<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Abstractions\IControllers\IMessage;
use App\Http\Controllers\Abstractions\AController;
use App\Repository\RMessage;

class CMessage extends AController implements IMessage
{
    public function __construct(RMessage $repository)
    {
        parent::__construct($repository);
    }
}