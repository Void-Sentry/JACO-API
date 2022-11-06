<?php 

namespace App\Http\Controllers;

use App\Service\Abstractions\IServices\IMessage as SIMessage;
use App\Http\Controllers\Abstractions\IControllers\IMessage;
use App\Http\Controllers\Abstractions\AController;

final class CMessage extends AController implements IMessage
{
    public function __construct(SIMessage $service)
    {
        parent::__construct($service);
    }
}