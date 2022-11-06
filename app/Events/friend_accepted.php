<?php
 
namespace App\Events;
 
// use App\Models\Order;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
 
class OrderShipped
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
 
    /**
     * The order instance.
     *
     * @var \App\Models\Order
     */
    public $chat;
 
    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function __construct(ChatPrivate $chat)
    {
        $this->chat = $chat;
    }
}