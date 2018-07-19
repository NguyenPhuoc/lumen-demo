<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Users;
use Illuminate\Support\Facades\Redis;

class NewUsers extends Job
{
    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;
    public $name;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $name = $this->name . '_queue1';
            $user = new Users();
            $user->user_name = $name;
            $user->full_name = $name;
            $user->setAttribute('email', 123);
            $user->save();
        }catch (\Exception $e){
            $redis = Redis::connection();
            $redis->publish('message', $e->getMessage());
        }
    }
}
