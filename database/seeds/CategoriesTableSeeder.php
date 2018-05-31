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
    }
}
