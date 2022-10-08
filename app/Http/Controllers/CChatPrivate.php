<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Abstractions\IControllers\IChatPrivate;
use App\Http\Controllers\Abstractions\AController;
use App\Repository\RChatPrivate;

class CChatPrivate extends AController implements IChatPrivate
{
    public function __construct(RChatPrivate $repository)
    {
        parent::__construct($repository);
    }
}