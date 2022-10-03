<?php

namespace App\Models;
use App\Models\Abstractions\IModels\IChatPrivate;
use App\Models\Abstractions\AEntity;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ChatPrivate extends AEntity implements IChatPrivate
{     
    protected array $fillable = ['friends_id', 'message_id'];

    public function friend(): HasOne
    {
      return $this->hasOne(Friend::class, 'friends_id', 'id');  
    } 

    public function messages(): HasMany
    {
      return $this->hasMany(Message::class, 'message_id', 'id');  
    }
}
