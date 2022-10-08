<?php

namespace App\Models;

use App\Models\Abstractions\AEntity;
use App\Models\Abstractions\IModels\IMessage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends AEntity implements IMessage
{
    protected $fillable = ['message'];

    public function chatPrivate(): BelongsTo
    {
        return $this->belongsTo(ChatPrivate::class);
    }
}
