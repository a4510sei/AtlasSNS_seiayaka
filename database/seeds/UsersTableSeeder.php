<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('users')->where('id', 1)->delete();
        // DB::table('users')->insert([
        DB::table('users')->where('id',1)->update(
            ['username' => 'Atlas一郎',
            'mail' => 'Atlas1@mail.com',
            'password' => Hash::make('pass1234'),
            'bio' => 'プロフィール更新テスト',
            'images' => 'icon7.png',
            ],
            // ['username' => 'Atlas二郎',
            // 'mail' => 'Atlas2@mail.com',
            // 'password' => Hash::make('pass2234')],
            // ['username' => 'Atlas三郎',
            // 'mail' => 'Atlas3@mail.com',
            // 'password' => Hash::make('pass3234')],
            // ['username' => 'Atlas四郎',
            // 'mail' => 'Atlas4@mail.com',
            // 'password' => Hash::make('pass4234')],
        );
    }
}
