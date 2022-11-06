<?php 

namespace App\Http\Controllers;

use App\Repository\Abstractions\IRepositories\IChatPrivate as RIChatPrivate;
use App\Http\Controllers\Abstractions\IControllers\IChatPrivate;
use App\Http\Controllers\Abstractions\AController;

final class CChatPrivate extends AController implements IChatPrivate
{
    public function __construct(RIChatPrivate $repository)
    {
        parent::__construct($repository);
    }
}