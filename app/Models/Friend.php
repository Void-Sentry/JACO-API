<?php 

namespace App\Models;

use App\Models\Abstractions\AEntity;
use App\Models\Abstractions\IModels\IFriend;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Friend extends AEntity implements IFriend
{
    use SoftDeletes;

    protected $fillable = ['user_from', 'user_to', 'status'];

    protected $with = ['user_to', 'user_from', 'pending', 'messages'];

    public function chatPrivate(): BelongsTo
    {
        return $this->belongsTo(ChatPrivate::class);
    }

    public function user_to(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_to');
    }

    public function user_from(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_from');
    }

    public function pending(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_from');
    }

    public function messages(): HasMany
    {
      return $this->hasMany(Message::class, 'user_from', 'user_from');
    }
    
}