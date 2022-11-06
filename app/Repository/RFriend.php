<?php 

namespace App\Repository;

use App\Repository\Abstractions\ARepository;
use App\Repository\Abstractions\IRepository;
use App\Repository\Abstractions\IRepositories\IFriend;
use App\Models\Friend;

final class RFriend extends ARepository implements IFriend
{
    private Friend $_entity;

    public function __construct(Friend $entity)
    {
        $this->_entity = $entity;
        parent::__construct($entity);
    }

    public function auth_user_list_friends(int $id): object
    {
        return $this->_entity->where([['status', 1], [function($query) use($id) {
                $query->where('user_from', $id)
                    ->orWhere('user_to', $id);
        }]])->get();
    }

    public function pending(int $id): object
    {
        return $this->_entity->where([['status', 0], ['user_to', $id]])->get();
    }

    public function accept_friend(int $id): bool
    {
        return $this->_entity->find($id)->update(['status' => 1]);
    }
}