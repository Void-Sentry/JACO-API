<?php

namespace App\Models;

use App\Models\Abstractions\IModels\IChatPrivate;
use App\Models\Abstractions\AEntity;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


final class ChatPrivate extends AEntity implements IChatPrivate
{     
  protected $fillable = ['friend_id'];

  protected $with = ['friend'];

  public function friend(): HasOne
  {
    return $this->hasOne(Friend::class, 'id', 'friend_id');
  }
}
