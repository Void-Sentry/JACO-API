<?php 

namespace App\Models;

use App\Models\Abstractions\AEntity;
use App\Models\Abstractions\Friends\IFriends;
use Illiminate\Database\Eloquent\Relations\HasMany;

class Friend extends AEntity implements IFriends
{
    protected array $fillable = ['user_from', 'user_to', 'status'];

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'id', 'id');
    }
}