<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'Group1',
            'genre_id' => '3',
            'user_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'storage/images/event/G2wrOA4DISiBmj9lYCbhxtdGINl9TOOgSNzKuM5f.jpeg',
            'intro' => 'おなはしするよーーーーーーーーーー',
        ]);
        DB::table('groups')->insert([
            'name' => 'Group2',
            'genre_id' => '2',
            'user_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'storage/images/event/G2wrOA4DISiBmj9lYCbhxtdGINl9TOOgSNzKuM5f.jpeg',
            'intro' => 'よーーーーーーーーーー',
        ]);
        DB::table('groups')->insert([
            'name' => 'Group3',
            'genre_id' => '1',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'storage/images/event/G2wrOA4DISiBmj9lYCbhxtdGINl9TOOgSNzKuM5f.jpeg',
            'intro' => 'おああああああああああーーーーーーーーーー',
        ]);
        DB::table('groups')->insert([
            'name' => 'Group1',
            'genre_id' => '2',
            'user_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'storage/images/event/G2wrOA4DISiBmj9lYCbhxtdGINl9TOOgSNzKuM5f.jpeg',
            'intro' => 'おなはしするよーーーーーーーーーー',
        ]);
    }
}
