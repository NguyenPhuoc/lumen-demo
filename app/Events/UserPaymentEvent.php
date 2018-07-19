<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 7/16/2018
 * Time: 10:05 AM
 */

namespace App\Events;


use App\Users;

class UserPaymentEvent extends Event
{
    public $users;
    public $gold;

    public function __construct(Users $users, $gold)
    {
        $this->users = $users;
        $this->gold = $gold;
    }
}