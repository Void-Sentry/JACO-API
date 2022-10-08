<?php 

namespace App\Models;

use App\Models\Abstractions\AEntity;
use App\Models\Abstractions\IModels\IFriends;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Friend extends AEntity implements IFriends
{
    protected $fillable = ['user_from', 'user_to'];

    public function chatPrivate(): BelongsTo
    {
        return $this->belongsTo(ChatPrivate::class);
    }
}