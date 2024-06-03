<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'user_id','post'
        DB::table('posts')->insert([
            ['user_id' => '27',
            'post' => 'はじめまして'],
        ]);
    }
}
