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
            ['user_id' => '1',
            'post' => 'はじめまして'],
            ['user_id' => '2',
            'post' => 'あ'],
            ['user_id' => '3',
            'post' => 'かっかああ'],
            ['user_id' => '4',
            'post' => 'テストテスト'],
        ]);
    }
}
