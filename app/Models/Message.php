<?php

namespace App\Models;

use App\Models\Abstractions\AEntity;
use App\Models\Abstractions\IModels\IMessage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends AEntity implements IMessage
{
    protected $fillable = ['message', 'chat_private_id'];

    public function chatPrivate(): HasOne
    {
        return $this->hasOne(ChatPrivate::class, 'chat_private_id', 'id');
    }
}
