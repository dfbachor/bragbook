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
        \DB::table('users')->insert([
            'name' => 'Dave B', 
            'systemID' => 1,
            'name' => 'daveb',
            'email' => 'dave@dfbiii.com',
            'password' => bcrypt('davedave'),
            'imageFileName' => null,
        ]);
    }
}
