<?php 

namespace App\Http\Controllers;

use App\Repository\Abstractions\IRepositories\IUser as RIUser;
use App\Http\Controllers\Abstractions\IControllers\IUser;
use App\Http\Controllers\Abstractions\AController;

final class CUser extends AController implements IUser
{
    public function __construct(RIUser $repository)
    {
        error_log('a');
        parent::__construct($repository);
    }
}