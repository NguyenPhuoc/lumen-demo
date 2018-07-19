<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 7/16/2018
 * Time: 10:05 AM
 */

namespace App\Listeners;

use App\Events\TestEvent;
use App\Events\UserPaymentEvent;
use App\Users;
use App\UserVips;
use App\Vips;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateVipUserPaymentListener implements ShouldQueue
{
    public function __construct()
    {
    }

    public function handle(UserPaymentEvent $paymentEvent){
        $user = $paymentEvent->users;
        $gold = $paymentEvent->gold;

        //Kiem tra vip hien tai
        $userVips = UserVips::where('user_id', $user->id)->first();
        if(!$userVips){
            $userVips = new UserVips();
            $userVips->user_id = $user->id;
        }
        $userVips->gold+=$gold;

        //lay data vip so sanh
        $vips = Vips::where('gold','<=',$userVips->gold)->orderBy('level', 'desc')->first();
        if($vips){
            $userVips->level = $vips->level;
        }

        $userVips->save();
    }
}