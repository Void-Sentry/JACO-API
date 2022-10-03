<?php

namespace App\Models;

use App\Models\Abstractions\AEntity;
use App\Models\Abstractions\IModels\IMessage;

class Message extends AEntity implements IMessage
{
    protected array $fillable = ['message'];

}
