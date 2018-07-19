<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 7/16/2018
 * Time: 11:37 AM
 */

namespace App\Events;


use App\Users;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestBroad extends Event implements ShouldBroadcast
{

    public $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|\Illuminate\Broadcasting\Channel[]
     */
    public function broadcastOn()
    {
        return ['my-channel'];
    }

    /**
     * Get the broadcast event name.
     *
     * @return string
     */
//    public function broadcastAs()
//    {
//        return 'app.test-broad';
//    }
}