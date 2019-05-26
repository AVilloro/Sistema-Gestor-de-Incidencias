<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([ // 1
        	'name' => 'Atención telefónica',
        	'project_id' => 1
    	]);
    	Level::create([ // 2
        	'name' => 'Ayuda presencial',
        	'project_id' => 1
    	]);

    	Level::create([ // 3
        	'name' => 'Soporte remoto',
        	'project_id' => 2
    	]);
    	Level::create([ // 4
        	'name' => 'Soporte especializado',
        	'project_id' => 2
    	]);
    }
}
