<?php 

namespace App\Service;

use App\Models\Abstractions\IModels\IChatPrivate as MIChatPrivate;
use App\Service\Abstractions\IServices\IChatPrivate;
use App\Service\Abstractions\IServices\IFriend;
use App\Service\Abstractions\AService;
use App\Service\Abstractions\IService;
use Illuminate\Database\Eloquent\Collection;

final class SChatPrivate extends AService implements IChatPrivate
{
    private MIChatPrivate $_entity;
    private IFriend $_friend;

    public function __construct(MIChatPrivate $entity, IFriend $friend)
    {
        $this->_entity = $entity;
        $this->_friend = $friend;
        parent::__construct($entity);
    }

    public function list_chats_from_user(): Collection
    {
        $friends = $this->_authenticated_user_list();
        return $this->_entity::whereIn('friend_id', $friends)->get();
    }

    private function _authenticated_user_list(): array
    {
        return $this->_get_friend_id($this->_friend->auth_user_list_friends(auth('sanctum')->user()->id)->toArray());
    }

    private function _get_friend_id(array $collection): array
    {
        return array_map(fn($item) => $item['id'], $collection);
    }
}

?>