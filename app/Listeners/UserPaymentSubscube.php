<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 7/16/2018
 * Time: 11:02 AM
 */

namespace App\Listeners;


use App\Events\TestEvent;
use App\Events\UserPaymentEvent;
use App\Users;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;

class UserPaymentSubscube implements ShouldQueue
{

    /**
     * Notify user nạp nhiều gold
     * @param UserPaymentEvent $event
     * */
    public function biggold($event)
    {
        $user = $event->users;
        $gold = $event->gold;
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen('App\Events\UserPaymentEvent', 'App\Listeners\UserPaymentSubscube@biggold');
    }
}