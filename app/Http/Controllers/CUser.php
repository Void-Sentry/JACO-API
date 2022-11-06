<?php 

namespace App\Http\Controllers;

use App\Service\Abstractions\IServices\IUser as SIUser;
use App\Http\Controllers\Abstractions\IControllers\IUser;
use App\Http\Controllers\Abstractions\AController;

final class CUser extends AController implements IUser
{
    public function __construct(SIUser $service)
    {
        error_log('a');
        parent::__construct($service);
    }
}