<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //following_id,followed_id
        DB::table('follows')->insert([
            ['following_id' => '1',
             'followed_id' => '2'],
        ]);
    }
}
