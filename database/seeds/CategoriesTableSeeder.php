<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            'systemID' => 2,
            'name' => 'Outdoor Painting Projects',
        ]);
        \DB::table('categories')->insert([
            'systemID' => 2,
            'name' => 'Indoor Painting Projects',
        ]);
        \DB::table('categories')->insert([
            'systemID' => 2,
            'name' => 'Heating',
        ]);
        \DB::table('categories')->insert([
            'systemID' => 2,
            'name' => 'Air Conditioning',
        ]);
        \DB::table('categories')->insert([
            'systemID' => 2,
            'name' => 'Sports',
        ]);
        \DB::table('categories')->insert([
            'systemID' => 2,
            'name' => 'Landscaping',
        ]);
        \DB::table('categories')->insert([
            'systemID' => 2,
            'name' => 'Driveways',
        ]);
        \DB::table('categories')->insert([
            'systemID' => 2,
            'name' => 'Trees',
        ]);
        \DB::table('categories')->insert([
            'systemID' => 2,
            'name' => 'Playgrounds',
        ]);
        \DB::table('categories')->insert([
            'systemID' => 2,
            'name' => 'Fishing',
        ]);
    }
}
