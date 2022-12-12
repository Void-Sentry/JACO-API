<?php
 
namespace App\Events;
 
// use App\Models\Order;
use App\Models\ChatPrivate;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
 
class friend_restored
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
 
    /**
     * Create a new event instance.
     *
     * @param  \App\Service\Abstractions\IServices\IChatPrivate  $chat private
     * @return void
     */
    public function __construct(string $id)
    {
        $chat = new ChatPrivate();
        $chat->withTrashed()->where('friend_id', $id)->restore();
    }
}