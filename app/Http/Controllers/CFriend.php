<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Abstractions\IControllers\IFriend;
use App\Http\Controllers\Abstractions\AController;
use App\Repository\RFriend;

class CFriend extends AController implements IFriend
{
    public function __construct(RFriend $repository)
    {
        parent::__construct($repository);
    }
}