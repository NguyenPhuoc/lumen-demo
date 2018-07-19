<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 7/16/2018
 * Time: 10:05 AM
 */

namespace App\Listeners;

use App\Events\TestEvent;
use App\Users;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(TestEvent $testEvent){
//        sleep(5);
        $name = $testEvent->name.'_event';
        $user = new Users;
        $user->user_name = $name;
        $user->full_name = $name;
        $user->save();
    }
}