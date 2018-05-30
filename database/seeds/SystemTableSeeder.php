<?php

use Illuminate\Database\Seeder;

class SystemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('systems')->insert([
            'id' => '1',
            'companyName' => 'dfbiii', 
            'email' => 'dave@dfbiii.com', 
            'imageFileName' => 'system_1_1_default.png',
            'created_at' => now(),
        ]);
    }
}
