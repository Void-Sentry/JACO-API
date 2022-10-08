<?php

namespace App\Models;
use App\Models\Abstractions\IModels\IChatPrivate;
use App\Models\Abstractions\AEntity;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ChatPrivate extends AEntity implements IChatPrivate
{     
    protected $fillable = ['friend_id', 'message_id'];

    protected $with = ['friend', 'messages'];

    public function friend(): HasOne
    {
      return $this->hasOne(Friend::class, 'id');  
    } 

    public function messages(): HasMany
    {
      return $this->hasMany(Message::class, 'id');  
    }
}
