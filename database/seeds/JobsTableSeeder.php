<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('jobs')->insert([
            'systemID' => 2,
            'name' => 'City Hall',
            'description' => 'Painting project - halls and offices',
            'location' => null,
            'city' => 'Philadelphia',
            'state' => 'PA',
            'imageFileName' => null,
        ]);
    }
}
