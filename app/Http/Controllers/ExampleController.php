<?php

namespace App\Http\Controllers;

use App\Events\TestBroad;
use App\Events\TestEvent;
use App\Jobs\NewUsers;
use App\User;
use App\Users;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use mysqli;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @return string
     */
    public function abc()
    {
//        for ($i = 0; $i < 5; $i++) {
//            $job = new NewUsers('PHUOC_' . $i);
//            dispatch($job);
//        }

        $job = new NewUsers('Phuoc_');
        dispatch($job);

//        event(new TestEvent('Phuoc_Phuoc'));

//        $name = 'PHUOC';
//        $user = new Users();
//        $user->user_name = $name;
//        $user->full_name = $name;
//        $user->setAttribute('email',123);
//        $user->setGold(123);
//        $user->save();

//        Cache::put('abc', 1, 1);
//        Cache::increment('abc',3);
//        $abc = Cache::get('abc');

        $abc = Cache::remember('users', 1, function () {
            return Users::find(1);
        });

        $collection = collect([5, 3, 1, 2, 4]);

        $sorted = $collection->sort();

        $a = $sorted->reverse()->values()->all();


        $redis = Redis::connection();
        $redis->publish('message', 'Hello Nguyen Huu Phuoc 12_____');
        return [$redis->keys('*'), $abc, $a];
    }
}
