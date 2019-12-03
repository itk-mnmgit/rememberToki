<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dms')->insert([
            'user1_id' => '1',
            'user2_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dms')->insert([
            'user1_id' => '2',
            'user2_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('dms')->insert([
            'user1_id' => '3',
            'user2_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
