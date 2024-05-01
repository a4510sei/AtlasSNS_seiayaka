<?php

use Illuminate\Database\Seeder;

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
        DB::table('users')->insert([
            ['username' => 'Atlas一郎',
            'mail' => 'Atlas1@mail.com',
            'password' => 'pass1234'],
            ['username' => 'Atlas二郎',
            'mail' => 'Atlas2@mail.com',
            'password' => 'pass2234'],
            ['username' => 'Atlas三郎',
            'mail' => 'Atlas3@mail.com',
            'password' => 'pass3234'],
        ]);
    }
}
