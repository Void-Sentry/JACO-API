<?php 

namespace App\Models;

use App\Models\Abstractions\AEntity;
use App\Models\Abstractions\IModels\IFriends;

class Friend extends AEntity implements IFriends
{
    protected array $fillable = ['user_from', 'user_to', 'status'];
}