<?php 

namespace App\Service;

use App\Models\Abstractions\IModels\IChatPrivate as MIChatPrivate;
use App\Service\Abstractions\IServices\IChatPrivate;
use App\Service\Abstractions\AService;
use App\Service\Abstractions\IService;
use Illuminate\Database\Eloquent\Collection;

final class SChatPrivate extends AService implements IChatPrivate
{
    private MIChatPrivate $_entity;

    public function __construct(MIChatPrivate $entity)
    {
        $this->_entity = $entity;
        parent::__construct($entity);
    }

    public function list_chats_from_user(array $id_friends): Collection
    {
        return $this->_entity::whereIn('friend_id', $id_friends)->get();
    }
}

?>