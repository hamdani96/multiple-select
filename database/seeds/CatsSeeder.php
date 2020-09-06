<?php

use Illuminate\Database\Seeder;
use App\Cat;

class CatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat::create([
            'name' => 'PHP',
        ]);

        Cat::create([
            'name' => 'Jquery',
        ]);

        Cat::create([
            'name' => 'React',
        ]);

        Cat::create([
            'name' => 'Vue Js',
        ]);

        Cat::create([
            'name' => 'CSS',
        ]);
    }
}
