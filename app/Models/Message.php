<?php

namespace App\Models;

use App\Models\Abstractions\AEntity;
use App\Models\Abstractions\IModels\IMessage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Message extends AEntity implements IMessage
{
    protected $fillable = ['message', 'chat_private_id', 'user_from'];

    protected $with = ['user_from'];

    public function chatPrivate(): HasOne
    {
        return $this->hasOne(ChatPrivate::class, 'chat_private_id', 'id');
    }

    public function user_from(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_from');
    }
}
