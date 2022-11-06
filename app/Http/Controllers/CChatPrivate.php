<?php 

namespace App\Http\Controllers;

use App\Service\Abstractions\IServices\IChatPrivate as SIChatPrivate;
use App\Http\Controllers\Abstractions\IControllers\IChatPrivate;
use App\Http\Controllers\Abstractions\AController;

final class CChatPrivate extends AController implements IChatPrivate
{
    public function __construct(SIChatPrivate $service)
    {
        parent::__construct($service);
    }
}