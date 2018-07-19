<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++)
            DB::table('users')->insert([
                'user_name' => 'phuocnh' . mt_rand(1, 100),
                'email' => 'phuocnh' . mt_rand(1, 100) . '@gmail.com',
                'gold' => mt_rand(10, 100),
                'exp' => mt_rand(100, 999),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
    }
}
