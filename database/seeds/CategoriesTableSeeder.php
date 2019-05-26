<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
			'name' => 'Word',
			'project_id' => 1
        ]);
        Category::create([
			'name' => 'Excel',
			'project_id' => 1
        ]);

        Category::create([
			'name' => 'Memoria RAM',
			'project_id' => 2
        ]);
        Category::create([
			'name' => 'Procesador',
			'project_id' => 2
        ]);
    }
}
