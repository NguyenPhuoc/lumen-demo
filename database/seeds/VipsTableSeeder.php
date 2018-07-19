<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('vips')->insert([
                'level' => $i,
                'name' => 'Level ' . $i,
                'gold' => 100 * $i,
            ]);
        }
    }
}
