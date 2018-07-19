<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 7/16/2018
 * Time: 10:05 AM
 */

namespace App\Events;

class TestEvent extends Event
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}