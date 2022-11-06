<?php 

namespace App\Service;

use App\Models\Abstractions\IModels\IFriend as MIFriend;
use App\Service\Abstractions\IServices\IFriend;
use App\Service\Abstractions\AService;
use App\Service\Abstractions\IService;
use Illuminate\Database\Eloquent\Collection;
use App\Events\friend_accepted;
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
}

?>