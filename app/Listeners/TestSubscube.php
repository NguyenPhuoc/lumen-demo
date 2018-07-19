<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 7/16/2018
 * Time: 11:02 AM
 */

namespace App\Listeners;


use App\Events\TestEvent;
use App\Users;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Events\Dispatcher;

class TestSubscube implements ShouldQueue
{

    /**
     * @param TestEvent $event
     * */
    public function subtest($event)
    {
//        sleep(5);
        $name = $event->name.'_sub';
        $user = new Users();
        $user->user_name = $name;
        $user->full_name = $name;
        $user->save();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Dispatcher  $events
     */
    public function subscribe($events)
    {
       $events->listen('App\Events\TestEvent', 'App\Listeners\TestSubscube@subtest');
    }

}