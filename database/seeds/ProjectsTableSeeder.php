<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('projects')->insert([
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
