<?php

namespace App\Models;

use App\Models\Abstractions\IModels\IChatPrivate;
use App\Models\Abstractions\AEntity;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class ChatPrivate extends AEntity implements IChatPrivate
{
  use SoftDeletes;

  protected $fillable = ['friend_id'];

  protected $with = ['friend', 'messages'];

  public function friend(): HasOne
  {
    return $this->hasOne(Friend::class, 'id', 'friend_id');
  }

  public function messages(): HasMany
  {
    return $this->hasMany(Message::class, 'chat_private_id', 'id');
  }
}
