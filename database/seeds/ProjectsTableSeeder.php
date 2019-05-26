<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
        	'name' => 'Software',
        	'description' => 'Soporte relacionado con el software.'
        ]);

        Project::create([
        	'name' => 'Hardware',
        	'description' => 'Soporte relacionado con el hardware.'
        ]);
    }
}
