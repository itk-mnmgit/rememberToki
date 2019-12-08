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
            'name' => 'basketball',
            'genre_id' => '1',
            'user_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'storage/images/event/G2wrOA4DISiBmj9lYCbhxtdGINl9TOOgSNzKuM5f.jpeg',
            'intro' => 'バスケするよーーーーーーーーーー',
            'startTime' => '2019-12-03 00:00:00',
        ]);
        DB::table('events')->insert([
            'name' => 'football',
            'genre_id' => '1',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'storage/images/event/G2wrOA4DISiBmj9lYCbhxtdGINl9TOOgSNzKuM5f.jpeg',
            'intro' => 'サッカーするよーーーーーーーーーー',
            'startTime' => '2019-11-13 00:00:00',
        ]);
        DB::table('events')->insert([
            'name' => 'volleyball',
            'genre_id' => '2',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'storage/images/event/G2wrOA4DISiBmj9lYCbhxtdGINl9TOOgSNzKuM5f.jpeg',
            'intro' => 'バレーーするよーーーーーーーーーー',
            'startTime' => '2019-12-15 09:00:00',
        ]);
        DB::table('events')->insert([
            'name' => 'baseball',
            'genre_id' => '3',
            'user_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'storage/images/event/G2wrOA4DISiBmj9lYCbhxtdGINl9TOOgSNzKuM5f.jpeg',
            'intro' => '野球するよーーーーーーーーーー',
            'startTime' => '2019-11-27 14:00:00',
        ]);

    }
}
