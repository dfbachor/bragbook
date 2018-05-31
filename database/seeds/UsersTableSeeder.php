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
            'systemID' => 1,
            'name' => 'Dave B',
            'email' => 'dave@dfbiii.com',
            'password' => bcrypt('davedave'),
            'imageFileName' => null,
        ]);

        \DB::table('users')->insert([
            'systemID' => 2,
            'name' => 'Seed',
            'email' => 'seed@seed.com',
            'password' => bcrypt('seedseed'),
            'imageFileName' => null,
        ]);

    }
}
