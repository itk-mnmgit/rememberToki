<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => 'football',
            'genre_id' => '123',
            'user_id' => '123',
            'startTime' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('events')->insert([
            'name' => 'baseball',
            'genre_id' => '456',
            'user_id' => '456',
            'startTime' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('events')->insert([
            'name' => 'basketball',
            'genre_id' => '789',
            'user_id' => '789',
            'startTime' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
