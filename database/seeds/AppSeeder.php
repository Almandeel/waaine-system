<?php

use App\Hall;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Hall::create([
            'name'          => "data",
            'image'         => "data",
            'location'      => "data",
            'description'   => "data",
            'type'          => 1,
        ]);

        Hall::create([
            'name'          => "data", 
            'image'         => "data", 
            'location'      => "data", 
            'description'   => "data", 
            'type'          => 2,
        ]);

    }
}
