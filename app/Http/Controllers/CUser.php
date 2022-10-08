<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Abstractions\IControllers\IUser;
use App\Http\Controllers\Abstractions\AController;
use App\Repository\RUser;

class CUser extends AController implements IUser
{
    public function __construct(RUser $repository)
    {
        parent::__construct($repository);
    }
}