<?php 

namespace App\Service;

use App\Models\Abstractions\IModels\IFriend as MIFriend;
use App\Service\Abstractions\IServices\IFriend;
use Illuminate\Database\Eloquent\Collection;
use App\Service\Abstractions\AService;
use App\Service\Abstractions\IService;
use App\Events\friend_accepted;
use App\Events\friend_restored;
use App\Events\friend_blocked;
use App\Models\Friend;

final class SFriend extends AService implements IFriend
{
    private MIFriend $_entity;

    public function __construct(MIFriend $entity)
    {
        $this->_entity = $entity;
        parent::__construct($entity);
    }

    public function auth_user_list_friends(int $id): Collection
    {
        return $this->_entity->where([['status', 1], [function($query) use($id) {
                $query->where('user_from', $id)
                    ->orWhere('user_to', $id);
        }]])->get();
    }

    public function pending(int $id): Collection
    {
        return $this->_entity->where([['status', 0], ['user_to', $id]])->get();
    }

    public function accept_friend(int $id): Friend
    {
        $item = $this->_entity->find($id);
        $item->update(['status' => 1]);
        friend_accepted::dispatch($item->id);
        return $item;
    }

    public function blocked_friends(): Collection
    {
        return $this->_entity->withTrashed()->where([
            ['id', auth('sanctum')->user()->id],
            ['deleted_at', '!=', null]
        ])->get();
    }

    public function block_friend(string $id): void
    {
        $item = $this->_entity->findOrFail($id);
        $item->delete();
        friend_blocked::dispatch($id);
    }

    public function restore_friend(string $id): void
    {
        $this->_entity->withTrashed()->where('id', $id)->restore();
        friend_restored::dispatch($id);
    }
}

?>